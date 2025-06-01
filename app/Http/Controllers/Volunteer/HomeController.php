<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use App\Models\VolunteerTask;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $total = VolunteerTask::where('volunteer_id',auth('volunteer')->user()->id)->count();
        $done = VolunteerTask::where('volunteer_id',auth('volunteer')->user()->id)->where('status','done')->count();
        $hours = 0;
        return view('volunteer.home',compact('total','done','hours'));
    }
}
