@extends('frontend.layouts.main')
@section('content')
    @include('frontend.partials.breadcrumb', ['heading' => 'عن الجمعية', 'sub_heading' => ' عن الجمعية'])
    <!-- start cta-s1-section -->
    <section class="cta-s1-section">
        <div class="container">
            <div class="row">
                <div class="col col-lg-5 col-md-5">
                    @if ($setting->about_photo)
                        <div class="img-holder">
                            <img src="{{ $setting->about_photo->getUrl() }}">
                        </div>
                    @endif
                </div>
                <div class="col col-lg-6 col-lg-offset-1 col-md-7">
                    <div class="info-col">
                        <div class="section-title text-right">
                            <span>الملخص التنفيذي</span>
                            <h2>عن الجمعيـــة</h2>
                        </div>

                        <div class="details">

                            <p class="just">
                                {!! $setting->descrption !!}

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>


    <!-- end cta-s1-section -->
    <!-- start mission-vision-section -->
    <section class="mission-vision-section">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="mission-vision-grids clearfix">
                        @foreach ($services as $service)
                            <div class="grid">
                                <div class="overlay"></div>

                                <p>
                                    {!! $service->description !!}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end mission-vision-section -->
    <!-- start partner-section -->
    <section class="partner-section "
        style="background-image: url(frontend/assets/images/news_bg.jpg); background-position:center center; direction: ltr;">

        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="partners-slider">
                        @foreach ($partners as $partner)
                            @if ($partner->image)
                                <div>
                                    <a href="{{$partner->name}}"><img src="{{ $partner->image->getUrl() }}" alt></a>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
@endsection
