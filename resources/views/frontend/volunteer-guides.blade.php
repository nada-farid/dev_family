@extends('frontend.layouts.main')
@section('content')
    @include('frontend.partials.breadcrumb', ['heading' => 'وحدة التطوع', 'sub_heading' => 'أدلة التطوع'])

    <section class="faq-pg-section section-padding">



        <div class="container">
            <div class="row">
                @foreach ($guides as $file)
                    <div class="col-lg-4 col-md-6">
                        <div class="hawkma-single-box">
                            <!-- donations thumb -->
                            <div class="hawkma-thumb">
                                <a href="{{ $file->file->getUrl() }}"><img
                                        src="{{ asset('frontend/assets/images/logo_icon.png') }}" alt=""></a>

                            </div>


                            <!-- blog title -->
                            <div class="hawkma-title">
                                <h5><a href="{{ $file->file->getUrl() }}"> {{ $file->title }} </a></h5>
                            </div>



                        </div>
                    </div>
                @endforeach



            </div>
        </div>


    </section>
    <!-- end -pg-section -->
    <hr />
@endsection
