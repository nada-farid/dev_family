<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVolunteerRequest;
use App\Models\Project;
use App\Models\VolunteerGuide;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Alert;

class VolunteerController extends Controller
{
    //
    public function show(){
        $projects = Project::all();
        return view('frontend.volunteer',compact('projects'));
    }
    public function volunteerGuide(){
        $guides = VolunteerGuide::all();
        return view('frontend.volunteer-guides',compact('guides'));
    }

    public function store(StoreVolunteerRequest $request){
        
        $volunteer = Volunteer::create($request->all());

        if ($request->hasFile('cv')) {
            $volunteer->addMedia($request->cv)->toMediaCollection('cv');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $volunteer->id]);
        }

        Alert::success(trans('flash.store.title'),trans('flash.store.body'));

        return redirect()->route('frontend.volunteer');
       
    }
}

