<?php

namespace App\Providers;


use App\Models\HawkamCategory;
use App\Models\Setting;
use App\Models\Service;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {  
        $setting = Setting::first();
        $hawkma_categories = HawkamCategory::all();
     
        
        View::share('setting', $setting);
        View::share('hawkma_categories', $hawkma_categories);
     
    }

    public function register()
    {
        //
    }
}
