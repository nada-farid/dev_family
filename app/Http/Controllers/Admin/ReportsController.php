<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyReportRequest;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Models\Report;
use App\Models\ReportCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ReportsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Report::with(['category'])->select(sprintf('%s.*', (new Report)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'report_show';
                $editGate      = 'report_edit';
                $deleteGate    = 'report_delete';
                $crudRoutePart = 'reports';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('type', function ($row) {
                return $row->type ? Report::TYPE_SELECT[$row->type] : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('file', function ($row) {
                return $row->file ? '<a href="' . $row->file->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->editColumn('image', function ($row) {
                if ($photo = $row->image) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('published', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->published ? 'checked' : null) . '>';
            });
            $table->addColumn('category_type', function ($row) {
                return $row->category ? $row->category->type : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'file', 'image', 'published', 'category']);

            return $table->make(true);
        }

        return view('admin.reports.index');
    }

    public function create()
    {
        abort_if(Gate::denies('report_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = ReportCategory::pluck('type', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.reports.create', compact('categories'));
    }

    public function store(StoreReportRequest $request)
    {
        $report = Report::create($request->all());

        if ($request->input('file', false)) {
            $report->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
        }

        if ($request->input('image', false)) {
            $report->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $report->id]);
        }

        return redirect()->route('admin.reports.index');
    }

    public function edit(Report $report)
    {
        abort_if(Gate::denies('report_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = ReportCategory::pluck('type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $report->load('category');

        return view('admin.reports.edit', compact('categories', 'report'));
    }

    public function update(UpdateReportRequest $request, Report $report)
    {
        $report->update($request->all());

        if ($request->input('file', false)) {
            if (! $report->file || $request->input('file') !== $report->file->file_name) {
                if ($report->file) {
                    $report->file->delete();
                }
                $report->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
            }
        } elseif ($report->file) {
            $report->file->delete();
        }

        if ($request->input('image', false)) {
            if (! $report->image || $request->input('image') !== $report->image->file_name) {
                if ($report->image) {
                    $report->image->delete();
                }
                $report->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($report->image) {
            $report->image->delete();
        }

        return redirect()->route('admin.reports.index');
    }

    public function show(Report $report)
    {
        abort_if(Gate::denies('report_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $report->load('category');

        return view('admin.reports.show', compact('report'));
    }

    public function destroy(Report $report)
    {
        abort_if(Gate::denies('report_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $report->delete();

        return back();
    }

    public function massDestroy(MassDestroyReportRequest $request)
    {
        $reports = Report::find(request('ids'));

        foreach ($reports as $report) {
            $report->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('report_create') && Gate::denies('report_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Report();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    
    public function getCategories(Request $request)
{
    $type = $request->input('type');
    $categories = ReportCategory::where('type', $type)->pluck('name', 'id');

    return response()->json($categories);
}
}
