@extends('frontend.layouts.main')
@section('content')
    @include('frontend.partials.breadcrumb', ['heading' => 'عن الجمعية', 'sub_heading' => 'الرؤيه والرسالة'])
    <!-- start faq-pg-section -->
    <section class="faq-pg-section section-padding">
        <div class="container">


            <div class="row">
                <div class="col col-xs-12">
                    <div class="panel-group faq-accordion theme-accordion-s1" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                    href="#collapse-1">الرؤية</a>
                            </div>
                            <div id="collapse-1" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="v-item">
                                        {!! $setting->vision !!}

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                    href="#collapse-2">الرسالة</a>
                            </div>
                            <div id="collapse-2" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="v-item">
                                        {!! $setting->mission !!}

                                    </div>


                                </div>
                            </div>
                        </div>



                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                    href="#collapse-3">قيمنــا</a>
                            </div>
                            <div id="collapse-3" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="v-item">
                                        {!! $setting->values !!}

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end faq-pg-section -->
@endsection
