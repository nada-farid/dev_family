<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySaidAboutUsRequest;
use App\Http\Requests\StoreSaidAboutUsRequest;
use App\Http\Requests\UpdateSaidAboutUsRequest;
use App\Models\SaidAboutUs;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SaidAboutUsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('said_about_us_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $saidAboutUss = SaidAboutUs::with(['media'])->get();

        return view('admin.saidAboutUss.index', compact('saidAboutUss'));
    }

    public function create()
    {
        abort_if(Gate::denies('said_about_us_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.saidAboutUss.create');
    }

    public function store(StoreSaidAboutUsRequest $request)
    {
        $saidAboutUs = SaidAboutUs::create($request->all());

        if ($request->input('image', false)) {
            $saidAboutUs->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $saidAboutUs->id]);
        }

        return redirect()->route('admin.said-about-uss.index');
    }

    public function edit(SaidAboutUs $saidAboutUs)
    {
        abort_if(Gate::denies('said_about_us_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.saidAboutUss.edit', compact('saidAboutUs'));
    }

    public function update(UpdateSaidAboutUsRequest $request, SaidAboutUs $saidAboutUs)
    {
        $saidAboutUs->update($request->all());

        if ($request->input('image', false)) {
            if (! $saidAboutUs->image || $request->input('image') !== $saidAboutUs->image->file_name) {
                if ($saidAboutUs->image) {
                    $saidAboutUs->image->delete();
                }
                $saidAboutUs->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($saidAboutUs->image) {
            $saidAboutUs->image->delete();
        }

        return redirect()->route('admin.said-about-uss.index');
    }

    public function show(SaidAboutUs $saidAboutUs)
    {
        abort_if(Gate::denies('said_about_us_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.saidAboutUss.show', compact('saidAboutUs'));
    }

    public function destroy(SaidAboutUs $saidAboutUs)
    {
        abort_if(Gate::denies('said_about_us_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $saidAboutUs->delete();

        return back();
    }

    public function massDestroy(MassDestroySaidAboutUsRequest $request)
    {
        $saidAboutUss = SaidAboutUs::find(request('ids'));

        foreach ($saidAboutUss as $saidAboutUs) {
            $saidAboutUs->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('said_about_us_create') && Gate::denies('said_about_us_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new SaidAboutUs();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
