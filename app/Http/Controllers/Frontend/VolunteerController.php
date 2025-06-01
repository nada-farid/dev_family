<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreVolunteerRequest;
use App\Models\Volunteer;
use Alert;
use App\Models\VolunteerGuide;

class VolunteerController extends Controller
{
    use MediaUploadingTrait;

    public function show()
    {
        return view('frontend.volunteer');
    }

    public function storeCKEditorImages(Request $request)
    {
        $model = new Volunteer();
        $model->id = $request->input('crud_id', 0);
        $model->exists = true;
        $media = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }


    public function volunteerGuide()
    {
        $guides = VolunteerGuide::all();
        return view('frontend.volunteer-guides', compact('guides'));
    }

    public function store(StoreVolunteerRequest $request)
    {
        $volunteer = Volunteer::create($request->all());
        
        if ($request->input('cv', false)) {
            $volunteer->addMedia(storage_path('tmp/uploads/' . basename($request->input('cv'))))->toMediaCollection('cv');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $volunteer->id]);
        } 

        alert('تم أرسال طلبك بنجاح','','success');
        return redirect()->route('frontend.volunteer');
    } 

}

