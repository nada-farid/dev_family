@extends('frontend.layouts.main')
@section('content')
    @include('frontend.partials.breadcrumb', [
        'heading' => 'التقارير',
        'sub_heading' => trans('global.' . $type),
    ])

    <section class="faq-pg-section section-padding">
        <div class="container">

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <div class="faq__accordian-main-wrapper" id="faq__accordian-main-wrapper">

                @foreach ($categories as $cate)
                    <div class="faq__accordion-wrapper">
                        <a class="faq__accordian-heading {{$loop->iteration == 2 ? 'active' : ''}}" href="#">{{ $cate->name }}</a>
                        <div class="faq__accordion-content" style="{{$loop->iteration == 2 ? 'display:block' : ' display:none'}}">

                            <div class="quarter">
                                <ul>
                                    @foreach ($cate->reports as $report)
                                        @if ($report->file)
                                            <li><a href="{{ $report->file->getUrl() }}">{{ $report->name }} </a></li>
                                        @endif
                                    @endforeach

                                </ul>
                            </div>


                        </div>
                    </div>
                @endforeach
            </div>


        </div> <!-- end container -->
    </section>
    <!-- end -pg-section -->


    <hr />
@endsection
@section('scripts')
    <script id="rendered-js">
        jQuery('.faq__accordian-heading').click(function(e) {
            e.preventDefault();
            if (!jQuery(this).hasClass('active')) {
                jQuery('.faq__accordian-heading').removeClass('active');
                jQuery('.faq__accordion-content').slideUp(500);
                jQuery(this).addClass('active');
                jQuery(this).next('.faq__accordion-content').slideDown(500);
            } else
            if (jQuery(this).hasClass('active')) {
                jQuery(this).removeClass('active');
                jQuery(this).next('.faq__accordion-content').slideUp(500);
            }
        });
        //# sourceURL=pen.js
    </script>
@endsection
