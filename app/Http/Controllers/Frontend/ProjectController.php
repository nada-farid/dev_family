<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function projects()
    {
        $projects = Project::all();
        return view('frontend.projects', compact('projects'));
    }

    public function project(Project $project)
    {
        return view('frontend.project', compact('project'));
    }
}
