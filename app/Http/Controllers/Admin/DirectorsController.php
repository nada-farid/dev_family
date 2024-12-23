<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDirectorRequest;
use App\Http\Requests\StoreDirectorRequest;
use App\Http\Requests\UpdateDirectorRequest;
use App\Models\Director;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DirectorsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('director_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Director::query()->select(sprintf('%s.*', (new Director)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'director_show';
                $editGate      = 'director_edit';
                $deleteGate    = 'director_delete';
                $crudRoutePart = 'directors';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('position', function ($row) {
                return $row->position ? $row->position : '';
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

            $table->rawColumns(['actions', 'placeholder', 'image']);

            return $table->make(true);
        }

        return view('admin.directors.index');
    }

    public function create()
    {
        abort_if(Gate::denies('director_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.directors.create');
    }

    public function store(StoreDirectorRequest $request)
    {
        $director = Director::create($request->all());

        if ($request->input('image', false)) {
            $director->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $director->id]);
        }

        return redirect()->route('admin.directors.index');
    }

    public function edit(Director $director)
    {
        abort_if(Gate::denies('director_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.directors.edit', compact('director'));
    }

    public function update(UpdateDirectorRequest $request, Director $director)
    {
        $director->update($request->all());

        if ($request->input('image', false)) {
            if (! $director->image || $request->input('image') !== $director->image->file_name) {
                if ($director->image) {
                    $director->image->delete();
                }
                $director->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($director->image) {
            $director->image->delete();
        }

        return redirect()->route('admin.directors.index');
    }

    public function show(Director $director)
    {
        abort_if(Gate::denies('director_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.directors.show', compact('director'));
    }

    public function destroy(Director $director)
    {
        abort_if(Gate::denies('director_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $director->delete();

        return back();
    }

    public function massDestroy(MassDestroyDirectorRequest $request)
    {
        $directors = Director::find(request('ids'));

        foreach ($directors as $director) {
            $director->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('director_create') && Gate::denies('director_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Director();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
