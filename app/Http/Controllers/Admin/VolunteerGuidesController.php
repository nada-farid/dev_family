<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyVolunteerGuideRequest;
use App\Http\Requests\StoreVolunteerGuideRequest;
use App\Http\Requests\UpdateVolunteerGuideRequest;
use App\Models\VolunteerGuide;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class VolunteerGuidesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('volunteer_guide_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $volunteerGuides = VolunteerGuide::with(['media'])->get();

        return view('admin.volunteerGuides.index', compact('volunteerGuides'));
    }

    public function create()
    {
        abort_if(Gate::denies('volunteer_guide_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.volunteerGuides.create');
    }

    public function store(StoreVolunteerGuideRequest $request)
    {
        $volunteerGuide = VolunteerGuide::create($request->all());

        if ($request->input('file', false)) {
            $volunteerGuide->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
        }

        if ($request->input('icon', false)) {
            $volunteerGuide->addMedia(storage_path('tmp/uploads/' . basename($request->input('icon'))))->toMediaCollection('icon');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $volunteerGuide->id]);
        }

        return redirect()->route('admin.volunteer-guides.index');
    }

    public function edit(VolunteerGuide $volunteerGuide)
    {
        abort_if(Gate::denies('volunteer_guide_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.volunteerGuides.edit', compact('volunteerGuide'));
    }

    public function update(UpdateVolunteerGuideRequest $request, VolunteerGuide $volunteerGuide)
    {
        $volunteerGuide->update($request->all());

        if ($request->input('file', false)) {
            if (! $volunteerGuide->file || $request->input('file') !== $volunteerGuide->file->file_name) {
                if ($volunteerGuide->file) {
                    $volunteerGuide->file->delete();
                }
                $volunteerGuide->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
            }
        } elseif ($volunteerGuide->file) {
            $volunteerGuide->file->delete();
        }

        if ($request->input('icon', false)) {
            if (! $volunteerGuide->icon || $request->input('icon') !== $volunteerGuide->icon->file_name) {
                if ($volunteerGuide->icon) {
                    $volunteerGuide->icon->delete();
                }
                $volunteerGuide->addMedia(storage_path('tmp/uploads/' . basename($request->input('icon'))))->toMediaCollection('icon');
            }
        } elseif ($volunteerGuide->icon) {
            $volunteerGuide->icon->delete();
        }

        return redirect()->route('admin.volunteer-guides.index');
    }

    public function show(VolunteerGuide $volunteerGuide)
    {
        abort_if(Gate::denies('volunteer_guide_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.volunteerGuides.show', compact('volunteerGuide'));
    }

    public function destroy(VolunteerGuide $volunteerGuide)
    {
        abort_if(Gate::denies('volunteer_guide_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $volunteerGuide->delete();

        return back();
    }

    public function massDestroy(MassDestroyVolunteerGuideRequest $request)
    {
        $volunteerGuides = VolunteerGuide::find(request('ids'));

        foreach ($volunteerGuides as $volunteerGuide) {
            $volunteerGuide->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('volunteer_guide_create') && Gate::denies('volunteer_guide_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new VolunteerGuide();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
