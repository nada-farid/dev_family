@extends('frontend.layouts.main')
@section('content')
    @include('frontend.partials.breadcrumb', [
        'heading' => 'الأخبار',
        'sub_heading' => $new->name,
    ])
    <!-- start blog-pg-section -->
    <section class="blog-pg-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col col-md-10 col-md-offset-1">
                    <div class="blog-content">
                        <div class="post format-standard-image">
                            @if ($new->inside_image)
                                <div class="entry-media">
                                    <img src="{{ $new->inside_image->getUrl() }}">
                                </div>
                            @endif
                            <div class="entry-details">
                                <div class="date"> {{ $new->custom_date }} </div>
                                <h3>{{ $new->name }}</h3>
                                <p>{!! $new->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end blog-pg-section -->
@endsection
