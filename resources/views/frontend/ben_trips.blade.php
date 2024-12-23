@extends('frontend.layouts.main')
@section('content')
    @include('frontend.partials.breadcrumb', [
        'heading' => 'عن الجمعية',
        'sub_heading' => ' رحلة المستفيد',
    ])
    <!-- start faq-pg-section -->
    <div class="values section-padding">
        <div class="container">
            <div class="row">
                @foreach ($ben_trips as $trip)
                    <div class="col-md-6">
                        <div class="value">
                            @if ($trip->icon)
                                <div class="value-icon">
                                    <div class="pic"><img src="{{ $trip->icon->getUrl() }}" /></div>
                                </div>
                            @endif
                            <div class="value-desc">
                                <h3>{{ $trip->title }} </h3>
                                <p> {{ $trip->description }}</p>
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
