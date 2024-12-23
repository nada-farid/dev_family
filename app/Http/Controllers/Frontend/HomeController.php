<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Beneficiary;
use App\Models\BeneficiaryJourney;
use App\Models\Director;
use App\Models\Gallery;
use App\Models\HawkamCategory;
use App\Models\Hawkma;
use App\Models\News;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Report;
use App\Models\ReportCategory;
use App\Models\SaidAboutUs;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Stakeholder;
use App\Models\Support;
use App\Models\SwotAnalysi;
use App\Models\Value;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    //
    public function index()
    {
        $sliders = Slider::all();
        $services = Service::get();
        $projects = Project::all();
        $news = News::get()->take(3);
        $testimonials = SaidAboutUs::all();
        $clients = Partner::all();
        $benficiaries =  Beneficiary::all();
        return view('frontend.index', compact('sliders', 'services', 'projects', 'news', 'testimonials','clients','benficiaries'));
    }
    public function about()
    {
        $services = Service::all();
        $partners = Partner::all();
        return view('frontend.about',compact('services','partners'));
    }

    
    public function vision()
    {
        return view('frontend.vision');
    }

    public function swat()
    {
        $swat = SwotAnalysi::all();
        return view('frontend.swat',compact('swat'));
    }

    
    public function benciaries()
    {
        $benciaries = Beneficiary::all();
        return view('frontend.benciaries',compact('benciaries'));
    }

    public function stakeholder()
    {
        $stakeholders = Stakeholder::all();
        return view('frontend.stakholders',compact('stakeholders'));
    }

    public function benTrip()
    {
        $ben_trips = BeneficiaryJourney::all();
        return view('frontend.ben_trips',compact('ben_trips','ben_trips'));
    }

    

    public function values()
    {
        $values = Value::all();
        return view('frontend.values',compact('values'));
    }

    public function supports()
    {
        $supports = Support::all();
        return view('frontend.supports',compact('supports'));
    }
    public function chairman()
    {
        return view('frontend.chairman');
    }

    public function partners()
    {
        $partners = Partner::all();
        return view('frontend.partners',compact('partners'));
    }

    public function directors()
    {
        $directors = Director::all();
        return view('frontend.directors',compact('directors'));
    }
    
    public function hawkma(HawkamCategory $category)
    {
        $files = Hawkma::where('category_id',$category->id)->get();
        return view('frontend.hawkma',compact('files','category'));
    }
    public function reports($type)
    {
        $categories = ReportCategory::where('type',$type)->get();
        return view('frontend.reports',compact('categories','type'));
    }

    
    public function gallery()
    {
        $galleries = Gallery::get();
        return view('frontend.gallery',compact('galleries'));
    }

    public function cache()
    {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
      
            Artisan::call('storage:link');
    }
}
