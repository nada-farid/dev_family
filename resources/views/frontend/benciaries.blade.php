@extends('frontend.layouts.main')
@section('content')
    @include('frontend.partials.breadcrumb', [
        'heading' => 'عن الجمعية',
        'sub_heading' => ' المستفيدون والاثر المطلوب ونسبة التركيز',
    ])
    <!-- start faq-pg-section -->
    <div class="causes-section causes-section-s2 section-padding" style="padding-top:40px;">
        <div class="container">
            <div class="row">
                @foreach ($benciaries as $benf)
                    <div class=" col-md-3 col-sm-6">
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

                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <!-- end faq-pg-section -->

    <hr />
@endsection
