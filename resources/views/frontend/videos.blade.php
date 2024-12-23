@extends('frontend.layouts.main')
@section('content')
    @include('frontend.partials.breadcrumb', [
        'heading' => 'المركز الإعلامي',
        'sub_heading' => 'الفيديوهات',
    ])

    <!-- start blog-pg-section -->
    <section class="blog-pg-section blog-pg-left-sidebar section-padding">
        <div class="container">
            <div class="row">
                @foreach ($videos as $video)
                    <div class="col col-md-4 ">

                        <div class="post format-video">
                            <div class="entry-media video-holder">
                                <img src="{{ $video->image->getUrl() }}" alt>
                                <a href="{{$video->url}}" class="video-btn" data-type="iframe">
                                    <i class="fi flaticon-play-button"></i>
                                </a>
                            </div>
                            <div class="entry-details">
                                <div class="date">{{ $video->custom_date }}</div>
                                <h3><a href="#">{{ $video->title }} </a></h3>

                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div> <!-- end container -->
        {!! $videos->links() !!}
    </section>
    <!-- end blog-pg-section -->
@endsection
