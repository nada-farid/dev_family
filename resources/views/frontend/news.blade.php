@extends('frontend.layouts.main')
@section('content')
    @include('frontend.partials.breadcrumb', [
        'heading' => 'المركز الإعلامي',
        'sub_heading' => 'أخبــار الجمعية',
    ])
    <!-- start blog-section -->
    <section class="blog-section ">
        <div class="container">

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
                                        <a href="{{route('frontend.new',$new->id)}}">
                                         {{$new->name}}
                                        </a>
                                    </h3>
                                    <p>
                                       {{$new->short_description}}
                                    </p>
                                    <a href="{{route('frontend.new',$new->id)}}" class="btn theme-btn-s6"> المزيد</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            {!! $news->links() !!}
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end blog-section -->
@endsection
