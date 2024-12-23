<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyValueRequest;
use App\Http\Requests\StoreValueRequest;
use App\Http\Requests\UpdateValueRequest;
use App\Models\Value;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ValuesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('value_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $values = Value::with(['media'])->get();

        return view('admin.values.index', compact('values'));
    }

    public function create()
    {
        abort_if(Gate::denies('value_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.values.create');
    }

    public function store(StoreValueRequest $request)
    {
        $value = Value::create($request->all());

        if ($request->input('icon', false)) {
            $value->addMedia(storage_path('tmp/uploads/' . basename($request->input('icon'))))->toMediaCollection('icon');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $value->id]);
        }

        return redirect()->route('admin.values.index');
    }

    public function edit(Value $value)
    {
        abort_if(Gate::denies('value_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.values.edit', compact('value'));
    }

    public function update(UpdateValueRequest $request, Value $value)
    {
        $value->update($request->all());

        if ($request->input('icon', false)) {
            if (! $value->icon || $request->input('icon') !== $value->icon->file_name) {
                if ($value->icon) {
                    $value->icon->delete();
                }
                $value->addMedia(storage_path('tmp/uploads/' . basename($request->input('icon'))))->toMediaCollection('icon');
            }
        } elseif ($value->icon) {
            $value->icon->delete();
        }

        return redirect()->route('admin.values.index');
    }

    public function show(Value $value)
    {
        abort_if(Gate::denies('value_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.values.show', compact('value'));
    }

    public function destroy(Value $value)
    {
        abort_if(Gate::denies('value_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $value->delete();

        return back();
    }

    public function massDestroy(MassDestroyValueRequest $request)
    {
        $values = Value::find(request('ids'));

        foreach ($values as $value) {
            $value->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('value_create') && Gate::denies('value_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Value();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
