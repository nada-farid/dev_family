@extends('frontend.layouts.main')
@section('content')
    @include('frontend.partials.breadcrumb', [
        'heading' => 'عن الجمعية',
        'sub_heading' => 'أصحاب المصلحة',
    ])
    <!-- start mission-vision-section -->
    <section class="mission-vision-section section-padding ">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="mission-vision-grids clearfix">
                        @foreach ($stakeholders as $stackholder)
                            <div class="grid">
                                <div class="overlay"
                                    style="background: url({{ $stackholder->background_image ? $stackholder->background_image->getUrl() : asset('frontend/assets/images/m-1.jpg') }})">
                                </div>
                                <h3 class=" text-center">
                                    {{ $stackholder->title }}
                                </h3>
                                <br />
                                <P> {!! Str::limit($stackholder->description, 120) !!}</P>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end mission-vision-section -->
@endsection
