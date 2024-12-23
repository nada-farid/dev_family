@extends('frontend.layouts.main')
@section('styles')
    <link href="{{ asset('frontend/assets/css/bootstrap-touchspin.css') }}" rel="stylesheet">
@endsection
@section('content')
    @include('frontend.partials.breadcrumb', [
        'heading' => 'عن الجمعية',
        'sub_heading' => ' التحليل الرباعي SWAT',
    ])
    <!-- start faq-pg-section -->

    <section class="timeline section-padding" style="direction:rtl;">
        <ul>
            @foreach ($swat as $item)
                <li>
                    <div>
                        {{ $item->title }}
                    </div>
                </li>
            @endforeach
        </ul>
    </section>
    <!-- end faq-pg-section -->

    <hr />
@endsection
@section('scripts')
<script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-2c7831bb44f98c1391d6a4ffda0e1fd302503391ca806e7fcc7b9b87197aec26.js"></script>
    <script id="rendered-js">
        (function() {
            "use strict";

            // define variables
            var items = document.querySelectorAll(".timeline li");

            // check if an element is in viewport
            // http://stackoverflow.com/questions/123999/how-to-tell-if-a-dom-element-is-visible-in-the-current-viewport
            function isElementInViewport(el) {
                var rect = el.getBoundingClientRect();
                return (
                    rect.top >= 0 &&
                    rect.left >= 0 &&
                    rect.bottom <= (
                        window.innerHeight || document.documentElement.clientHeight) &&
                    rect.right <= (window.innerWidth || document.documentElement.clientWidth));

            }

            function callbackFunc() {
                for (var i = 0; i < items.length; i++) {
                    if (window.CP.shouldStopExecution(0)) break;
                    if (isElementInViewport(items[i])) {
                        items[i].classList.add("in-view");
                    }
                }
                window.CP.exitedLoop(0);
            }

            // listen for events
            window.addEventListener("load", callbackFunc);
            window.addEventListener("resize", callbackFunc);
            window.addEventListener("scroll", callbackFunc);
        })();
        //# sourceURL=pen.js
    </script>
@endsection
