@extends('frontend.layouts.main')
@section('content')
    @include('frontend.partials.breadcrumb', [
        'heading' => 'المشروعات والمبادرات ',
        'sub_heading' => 'المشروعات والمبادرات',
    ])

    <section class="testimoninals-funfact-section  testimonials-pg-section text-right section-padding" style="direction:ltr;">
        <div class="container">


            <div class="row">
                @foreach ($projects as $project)
                    <div class=" col-md-4 col-sm-6">

                        <div class="initiatives">
                            <div class="author">
                                @if($project->image)
                                <div class="author-img">
                                    <img src="{{$project->image->getUrl()}}" alt>
                                </div>
                                @endif
                                <h3>{{$project->title}}</h3>
                            </div>
                            <p class="just">{{$project->short_description}}</p>

                            <a href="{{route('frontend.project',$project)}}" class="btn theme-btn-s6">المزيد</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
