@extends('frontend.layouts.main')
@section('content')
    <!-- start of hero -->
    <section class="hero-slider hero-style-3" style="direction:ltr;">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach ($sliders as $slider)
                    <div class="swiper-slide">
                        @if ($slider->image)
                            <a href="{{ $slider->link }}">
                                <div class="slide-inner slide-bg-image" data-background="{{ $slider->image->getUrl() }}">
                                    <div class="container">

                                    </div>
                                </div> <!-- end slide-inner -->
                            </a>
                        @endif
                    </div> <!-- end swiper-slide -->
                @endforeach
            </div>
            <!-- end swiper-wrapper -->
            <!-- swipper controls -->
            <div class="swiper-pagination"></div>
            <div class="pagi-arrow">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </section>
    <!-- end of hero slider -->
    <!-- start feature-section-s2 -->
    <section class="feature-section-s2">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="feature-grids clearfix">
                        <div class="grid grid_one">


                            <p> {{ $setting->home_card_1_text }}</p>

                        </div>
                        <div class="grid grid_two">


                            <p>{{ $setting->home_card_2_text }}</p>



                        </div>
                        <div class="grid grid_three">



                            <p><br /> {{ $setting->home_card_3_text }}</p>

                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end feature-section-s2 -->
    <!-- start about-s3-section -->
    <section class="about-s3-section section-padding"
        style="background-image: url({{ asset('frontend/assets/images/home_about_logo.png') }}); background-repeat:no-repeat; background-position:right;">
        <div class="container">
            <div class="row">
                <div class="col col-md-3"></div>
                <div class="col col-md-9">
                    <div class="about-title-area">
                        <div class="section-title">
                            <img src="{{ asset('frontend/assets/images/title_icon_green.png') }}" />
                            <h2>عن الجمعية</h2>
                            <div class="title-des">
                                <div class="leftbg"></div>

                                <h6> ونسبـــة التركيز والاثـــر المطلـــوب </h6>
                            </div>
                        </div>


                        {!! $setting->short_descrption !!}
                    </div>
                </div>


            </div>
        </div> <!-- end container -->
    </section>
    <!-- end about-s3-section -->
    <!-- start causes-section -->
    @if ($benficiaries->count() > 0)
        <section class="causes-section causes-section-s2 section-padding" style="direction:ltr;">
            <div class="container-fluid">
                <div class="section-title-s3">
                    <img src="{{ asset('frontend/assets/images/title_icon_green.png') }}">
                    <h2>المستفيدون</h2>
                    <div class="title-des">
                        <div class="leftbg"></div>

                        <h6> ونسبـــة التركيز والاثـــر المطلـــوب </h6>
                    </div>
                </div>
                <div class="content-area causes-slider">

                    @foreach ($benficiaries as $benf)
                        <div class="item">
                            <div class="inner">
                                @if ($benf->image)
                                    <div class="img-holder">
                                        <img src="{{ $benf->image->getUrl() }}" alt>
                                    </div>
                                @endif
                                <div class="overlay">
                                    <div class="overlay-content">

                                        <h2>0{{ $loop->index + 1 }}</h2>
                                        <h3>{{ $benf->name }}</h3>
                                        <p>{{ $benf->description }}</p>
                                        <div class="progress mt-10">
                                            <div class="progress-bar" role="progressbar"
                                                style="width: {{ $benf->precentatge }}%;"
                                                aria-valuenow="{{ $benf->precentatge }}" aria-valuemin="0"
                                                aria-valuemax="100">{{ $benf->precentatge }}%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach



                </div>
            </div>
        </section>
    @endif
    <!-- end causes-section -->
    <!-----------------cases------------------------>
    <!-- start testimoninals-funfact-section -->
    @if ($projects->count() > 0)
        <section class="testimoninals-funfact-section  testimonials-pg-section " style="direction:ltr;">
            <div class="container">
                <div class="row">
                    <div class="col col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                        <div class="section-title-s3">
                            <img src="{{ asset('frontend/assets/images/title_icon_green.png') }}">
                            <h2>المشاريع والبرامج</h2>
                            <div class="title-des">
                                <div class="leftbg"></div>

                                <h6> ونسبـــة التركيز والاثـــر المطلـــوب </h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-xs-12">
                        <div class="testimonials-slider-s2 testimonials-slider-area">
                            @foreach ($projects as $project)
                                <div class="grid">
                                    <div class="author">
                                        <div class="author-img">
                                            <img src="{{ $project->image->getUrl() }}" alt>
                                        </div>
                                        <h3>{{ $project->title }} </h3>
                                    </div>
                                    <p class="just">{{ $project->short_description }}</p>

                                    <a href="{{route('frontend.project',$project->id)}}" class="btn theme-btn-s6">المزيد</a>

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div> <!-- end container -->
        </section>
    @endif
    <!-- end testimoninals-funfact-section -->


    @if ($news->count() > 0)
        <!-- start blog-section -->
        <section class="blog-section section-padding"
            style="background-image: url({{ asset('frontend/assets/images/news_bg.jpg') }});">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="section-title-s2">
                            <img src="{{ asset('frontend/assets/images/title_icon_white.png') }}">
                            <h2 class=" color-white">أحدث الأخبار</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="blog-grids">
                            @foreach ($news as $new)
                                <div class="grid">
                                    @if ($new->image)
                                        <div class="entry-media">
                                            <img src="{{ $new->image->getUrl() }}">
                                        </div>
                                    @endif

                                    <div class="new-details">
                                        <p class="date">
                                        <div class="icon">
                                            <i class="fi flaticon-calendar"></i>

                                        </div> {{ $new->custom_date }}
                                        </p>

                                        <p class="date">
                                        <div class="icon">
                                            <i class="fi flaticon-heart"></i>

                                        </div>{{ $new->address }}
                                        </p>
                                    </div>


                                    <div class="entry-details">
                                        <h3>
                                            <a href="{{ route('frontend.new', $new->id) }}">
                                                {{ $new->name }}
                                            </a>
                                        </h3>
                                        <p>
                                            {{ $new->short_description }}
                                        </p>
                                        <a href="{{ route('frontend.new', $new->id) }}" class="btn theme-btn-s6">المزيد</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div> <!-- end container -->
        </section>
        <!-- end blog-section -->
    @endif
@endsection
