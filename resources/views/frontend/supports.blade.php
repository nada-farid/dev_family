@extends('frontend.layouts.main')
@section('content')
    @include('frontend.partials.breadcrumb', [
        'heading' => ' لماذا نحن؟',
        'sub_heading' => 'لماذا نحن؟',
    ])

    <!-- start cta-s1-section -->
    <section class="whyus_here">
        <div class="container">
            @foreach ($supports as $support)
                <div class="item">
                    <div class="number">0{{ $loop->index + 1 }}</div>
                    <div class="icon">
                        <img src="{{ $support->icon->getUrl() }}" />
                    </div>
                    <div class="details">
                        {{ $support->reason }}
                    </div>
                </div>
            @endforeach
        </div> <!-- end container -->
    </section>


    <!-- end cta-s1-section -->
@endsection
