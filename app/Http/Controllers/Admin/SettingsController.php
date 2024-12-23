<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
Use Alert;


class SettingsController extends Controller
{
    use MediaUploadingTrait;


    public function index()
    {
        $setting = Setting::first();
        abort_if(Gate::denies('setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settings.edit', compact('setting'));
    }

    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        $setting->update($request->all());

        if ($request->input('about_photo', false)) {
            if (!$setting->about_photo || $request->input('about_photo') !== $setting->about_photo->file_name) {
                if ($setting->about_photo) {
                    $setting->about_photo->delete();
                }
                $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('about_photo'))))->toMediaCollection('about_photo');
            }
        } elseif ($setting->about_photo) {
            $setting->about_photo->delete();
        }

        if ($request->input('inner_image', false)) {
            if (!$setting->inner_image || $request->input('inner_image') !== $setting->inner_image->file_name) {
                if ($setting->inner_image) {
                    $setting->inner_image->delete();
                }
                $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('inner_image'))))->toMediaCollection('inner_image');
            }
        } elseif ($setting->inner_image) {
            $setting->inner_image->delete();
        }

        if ($request->input('logo', false)) {
            if (!$setting->logo || $request->input('logo') !== $setting->logo->file_name) {
                if ($setting->logo) {
                    $setting->logo->delete();
                }
                $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($setting->logo) {
            $setting->logo->delete();
        }

        if ($request->input('chairman_image', false)) {
            if (!$setting->chairman_image || $request->input('chairman_image') !== $setting->chairman_image->file_name) {
                if ($setting->chairman_image) {
                    $setting->chairman_image->delete();
                }
                $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('chairman_image'))))->toMediaCollection('chairman_image');
            }
        } elseif ($setting->chairman_image) {
            $setting->chairman_image->delete();
        }

        if ($request->input('logo_white', false)) {
            if (!$setting->logo_white || $request->input('logo_white') !== $setting->logo_white->file_name) {
                if ($setting->logo_white) {
                    $setting->logo_white->delete();
                }
                $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo_white'))))->toMediaCollection('logo_white');
            }
        } elseif ($setting->logo_white) {
            $setting->logo_white->delete();
        }

        Alert::alert('تم بنجاح', 'تم  تعديل البيانات بنجاح', 'success');

        return redirect()->route('admin.settings.index');
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('setting_create') && Gate::denies('setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model = new Setting();
        $model->id = $request->input('crud_id', 0);
        $model->exists = true;
        $media = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
