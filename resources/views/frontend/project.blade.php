@extends('frontend.layouts.main')
@section('content')
    @include('frontend.partials.breadcrumb', [
        'heading' => 'المشروعات والمبادرات ',
        'sub_heading' => $project->title,
    ])

    <!-- start event-single-section -->
    <section class="event-single-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col col-lg-10 col-lg-offset-1">
                    <div class="row">
                        <div class="col col-md-9">
                            @if ($project->inner_image)
                                <div class="event-single-img">
                                    <img src="{{ $project->inner_image->getUrl() }}" alt>
                                </div>
                            @endif
                        </div>
                        <div class="col col-md-3">
                            <div class="event-info">
                                <h3> بيانات المشروع </h3>
                                <ul>
                                    <li>
                                        <i class="fi flaticon-calendar"></i>
                                        <h5>تاريخ البداية</h5>
                                        <p>{{ $project->start_custom_date }}</p>
                                    </li>
                                    <li>
                                        <i class="fi flaticon-guarantee"></i>
                                        <h5>تاريخ النهاية</h5>
                                        <p> {{ $project->end_custom_date }}</p>
                                    </li>
                                    <li>
                                        <i class="fi flaticon-down-arrow-3"></i>
                                        <h5>المكان</h5>
                                        <p>{{ $project->address }}</p>
                                    </li>
                                    <li>
                                        <i class="fi flaticon-like"></i>
                                        <h5> الفئة المستهدفة</h5>
                                        <p>{{$project->beneficiar?->name}}</p>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-lg-12">
                            <div class="event-text">
                                <h2>{{ $project->title }}</h2>
                                <p class="just">
                                    {!! $project->description !!}

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end event-single-section -->
@endsection
