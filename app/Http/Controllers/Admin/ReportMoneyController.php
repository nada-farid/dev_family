<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyReportMoneyRequest;
use App\Http\Requests\StoreReportMoneyRequest;
use App\Http\Requests\UpdateReportMoneyRequest;
use App\Models\ReportMoney;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ReportMoneyController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('report_money_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ReportMoney::query()->select(sprintf('%s.*', (new ReportMoney)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'report_money_show';
                $editGate      = 'report_money_edit';
                $deleteGate    = 'report_money_delete';
                $crudRoutePart = 'report-moneys';

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
            $table->editColumn('part', function ($row) {
                return $row->part ? ReportMoney::PART_SELECT[$row->part] : '';
            });
            $table->editColumn('year', function ($row) {
                return $row->year ? $row->year : '';
            });
            $table->editColumn('link', function ($row) {
                return $row->link ? $row->link : '';
            });
            $table->editColumn('published', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->published ? 'checked' : null) . '>';
            });
            $table->editColumn('file', function ($row) {
                return $row->file ? '<a href="' . $row->file->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'published', 'file']);

            return $table->make(true);
        }

        return view('admin.reportMoneys.index');
    }

    public function create()
    {
        abort_if(Gate::denies('report_money_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.reportMoneys.create');
    }

    public function store(StoreReportMoneyRequest $request)
    {
        $reportMoney = ReportMoney::create($request->all());

        if ($request->input('file', false)) {
            $reportMoney->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $reportMoney->id]);
        }

        return redirect()->route('admin.report-moneys.index');
    }

    public function edit(ReportMoney $reportMoney)
    {
        abort_if(Gate::denies('report_money_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.reportMoneys.edit', compact('reportMoney'));
    }

    public function update(UpdateReportMoneyRequest $request, ReportMoney $reportMoney)
    {
        $reportMoney->update($request->all());

        if ($request->input('file', false)) {
            if (! $reportMoney->file || $request->input('file') !== $reportMoney->file->file_name) {
                if ($reportMoney->file) {
                    $reportMoney->file->delete();
                }
                $reportMoney->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
            }
        } elseif ($reportMoney->file) {
            $reportMoney->file->delete();
        }

        return redirect()->route('admin.report-moneys.index');
    }

    public function show(ReportMoney $reportMoney)
    {
        abort_if(Gate::denies('report_money_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.reportMoneys.show', compact('reportMoney'));
    }

    public function destroy(ReportMoney $reportMoney)
    {
        abort_if(Gate::denies('report_money_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportMoney->delete();

        return back();
    }

    public function massDestroy(MassDestroyReportMoneyRequest $request)
    {
        $reportMoneys = ReportMoney::find(request('ids'));

        foreach ($reportMoneys as $reportMoney) {
            $reportMoney->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('report_money_create') && Gate::denies('report_money_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ReportMoney();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
