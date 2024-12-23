<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Video;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
    public function news()
    {
        $news = News::paginate(6);
        return view('frontend.news', compact('news'));
    }
    
    public function galleries()
    {
        $galleries = Gallery::all();
        return view('frontend.galleries', compact('galleries'));
    }
    public function videos()
    {
        $videos = Video::paginate(6);
        return view('frontend.videos', compact('videos'));
    }

    public function new($id){
        $new = News::find($id);
        return view('frontend.new',compact('new'));
    }
}
