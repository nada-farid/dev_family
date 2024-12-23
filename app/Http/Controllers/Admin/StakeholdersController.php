<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyStakeholderRequest;
use App\Http\Requests\StoreStakeholderRequest;
use App\Http\Requests\UpdateStakeholderRequest;
use App\Models\Stakeholder;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class StakeholdersController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('stakeholder_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stakeholders = Stakeholder::with(['media'])->get();

        return view('admin.stakeholders.index', compact('stakeholders'));
    }

    public function create()
    {
        abort_if(Gate::denies('stakeholder_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stakeholders.create');
    }

    public function store(StoreStakeholderRequest $request)
    {
        $stakeholder = Stakeholder::create($request->all());

        if ($request->input('background_image', false)) {
            $stakeholder->addMedia(storage_path('tmp/uploads/' . basename($request->input('background_image'))))->toMediaCollection('background_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $stakeholder->id]);
        }

        return redirect()->route('admin.stakeholders.index');
    }

    public function edit(Stakeholder $stakeholder)
    {
        abort_if(Gate::denies('stakeholder_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stakeholders.edit', compact('stakeholder'));
    }

    public function update(UpdateStakeholderRequest $request, Stakeholder $stakeholder)
    {
        $stakeholder->update($request->all());

        if ($request->input('background_image', false)) {
            if (! $stakeholder->background_image || $request->input('background_image') !== $stakeholder->background_image->file_name) {
                if ($stakeholder->background_image) {
                    $stakeholder->background_image->delete();
                }
                $stakeholder->addMedia(storage_path('tmp/uploads/' . basename($request->input('background_image'))))->toMediaCollection('background_image');
            }
        } elseif ($stakeholder->background_image) {
            $stakeholder->background_image->delete();
        }

        return redirect()->route('admin.stakeholders.index');
    }

    public function show(Stakeholder $stakeholder)
    {
        abort_if(Gate::denies('stakeholder_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stakeholders.show', compact('stakeholder'));
    }

    public function destroy(Stakeholder $stakeholder)
    {
        abort_if(Gate::denies('stakeholder_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stakeholder->delete();

        return back();
    }

    public function massDestroy(MassDestroyStakeholderRequest $request)
    {
        $stakeholders = Stakeholder::find(request('ids'));

        foreach ($stakeholders as $stakeholder) {
            $stakeholder->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('stakeholder_create') && Gate::denies('stakeholder_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Stakeholder();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
