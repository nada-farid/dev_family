<!-- start page-title -->
<section class="page-title" style="background: url({{$setting->inner_image ? $setting->inner_image->getUrl()  : asset('frontend/assets/images/page-title.jpg')}})">
    <div class="page-title-container">
        <div class="page-title-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <h2> {{ $heading }} </h2>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('frontend.home') }}">الرئيسية</a></li>
                            <li> {{ $sub_heading }} </li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </div>
    </div>
</section>
<!-- end page-title -->
