<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyHawkmaRequest;
use App\Http\Requests\StoreHawkmaRequest;
use App\Http\Requests\UpdateHawkmaRequest;
use App\Models\HawkamCategory;
use App\Models\Hawkma;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class HawkmaController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('hawkma_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Hawkma::with(['category'])->select(sprintf('%s.*', (new Hawkma)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'hawkma_show';
                $editGate      = 'hawkma_edit';
                $deleteGate    = 'hawkma_delete';
                $crudRoutePart = 'hawkmas';

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
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('file', function ($row) {
                return $row->file ? '<a href="' . $row->file->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->addColumn('category_name', function ($row) {
                return $row->category ? $row->category->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'file', 'category']);

            return $table->make(true);
        }

        return view('admin.hawkmas.index');
    }

    public function create()
    {
        abort_if(Gate::denies('hawkma_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = HawkamCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.hawkmas.create', compact('categories'));
    }

    public function store(StoreHawkmaRequest $request)
    {
        $hawkma = Hawkma::create($request->all());

        if ($request->input('file', false)) {
            $hawkma->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
        }

        if ($request->input('icon', false)) {
            $hawkma->addMedia(storage_path('tmp/uploads/' . basename($request->input('icon'))))->toMediaCollection('icon');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $hawkma->id]);
        }

        return redirect()->route('admin.hawkmas.index');
    }

    public function edit(Hawkma $hawkma)
    {
        abort_if(Gate::denies('hawkma_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = HawkamCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hawkma->load('category');

        return view('admin.hawkmas.edit', compact('categories', 'hawkma'));
    }

    public function update(UpdateHawkmaRequest $request, Hawkma $hawkma)
    {
        $hawkma->update($request->all());

        if ($request->input('file', false)) {
            if (! $hawkma->file || $request->input('file') !== $hawkma->file->file_name) {
                if ($hawkma->file) {
                    $hawkma->file->delete();
                }
                $hawkma->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
            }
        } elseif ($hawkma->file) {
            $hawkma->file->delete();
        }

        if ($request->input('icon', false)) {
            if (! $hawkma->icon || $request->input('icon') !== $hawkma->icon->file_name) {
                if ($hawkma->icon) {
                    $hawkma->icon->delete();
                }
                $hawkma->addMedia(storage_path('tmp/uploads/' . basename($request->input('icon'))))->toMediaCollection('icon');
            }
        } elseif ($hawkma->icon) {
            $hawkma->icon->delete();
        }

        return redirect()->route('admin.hawkmas.index');
    }

    public function show(Hawkma $hawkma)
    {
        abort_if(Gate::denies('hawkma_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hawkma->load('category');

        return view('admin.hawkmas.show', compact('hawkma'));
    }

    public function destroy(Hawkma $hawkma)
    {
        abort_if(Gate::denies('hawkma_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hawkma->delete();

        return back();
    }

    public function massDestroy(MassDestroyHawkmaRequest $request)
    {
        $hawkmas = Hawkma::find(request('ids'));

        foreach ($hawkmas as $hawkma) {
            $hawkma->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('hawkma_create') && Gate::denies('hawkma_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Hawkma();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
