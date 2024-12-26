<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">

    <title> {{ $setting->site_name }} </title>

    <link href="{{ asset('frontend/assets/css/themify-icons.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/02c22aec7b.js')}}" crossorigin="anonymous"></script>
    <link href="{{ asset('frontend/assets/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/swiper.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/owl.transitions.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/jquery.fancybox.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


    <!-- HTML5 shim and Respond.js')}} for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js')}}"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
    <![endif]-->
    <style>
        .invalid-feedback {
            color: #dc3545 !important;
        }

        .side-btn {
            position: fixed;
            left: 100%;
            top: 25%;
            background-color: #75cac0;
            text-align: center;
            padding: 5px;
            transform-origin: 0% 0%;
            -webkit-transform: rotate(90deg);
            -moz-transform: rotate(90deg);
            -o-transform: rotate(90deg);
            -ms-transform: rotate(90deg);
            transform: rotate(90deg) translateX(-50%);
            z-index: 999;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            width: 150px;

        }

        .side-btn a {
            color: #fff;
        }


        .side-btn2 {
            position: fixed;
            left: 100%;
            top: 45%;
            background-color: #033d33;
            text-align: center;
            padding: 5px;
            transform-origin: 0% 0%;
            -webkit-transform: rotate(90deg);
            -moz-transform: rotate(90deg);
            -o-transform: rotate(90deg);
            -ms-transform: rotate(90deg);
            transform: rotate(90deg) translateX(-50%);
            z-index: 999;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            width: 120px;
        }

        .side-btn2 a {
            color: #fff;
        }
    </style>

    @yield('styles')
</head>

<body>


    <!-- start page-wrapper -->
    <section class="page-wrapper">
        <div class="side-btn">
            <a href="https://charities-sys.com/charity/login.aspx?Ref=d5hj25kugp7jlg2yy4bzp6maqs6nt8784ve31q29">
                دخول المستفيدين
            </a>
        </div>
        <div class="side-btn2 ">
            <a href="https://charities-sys.com/charity/Login.aspx">
                دخول الإدارة
            </a>
        </div>

        <!-- start preloader -->
        <div class="preloader">
            <div class="preloader-inner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
        <!-- end preloader -->
        <!-- Start header -->
        <header id="header" class="site-header">
            @if ($setting->logo)
                <a class="navbar-brand" href="{{ route('frontend.home') }}"><img src="{{ $setting->logo->getUrl() }}"
                        alt></a>
            @endif


            <div class="left-top-bar">

                <div class="headerlinks">
                    <button type="button" class="btn btn-primary">
                        <a style="color:white" href="{{ $setting->donation_url }}">تبرع الان <i class="fa fa-heart"
                                aria-hidden="true"></i></a>
                    </button>
                    {{-- <button type="button" class="btn btn-secondry">تطوع معنا</button> --}}
                </div>
                <nav class="navigation navbar navbar-default">

                    <div class="navbar-header">
                        <button type="button" class="open-btn">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse navigation-holder">
                        <button class="close-navbar"><i class="ti-close"></i></button>
                        <ul class="nav navbar-nav">
                            <li class="menu-item-has-children current-menu-parent">
                                <a href="{{ route('frontend.home') }}">الرئيسية</a>

                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">عن الجمعية</a>
                                <ul class="sub-menu">
                                    <li> <a href="{{ route('frontend.about') }}">عن الجمعية</a> </li>
                                    <li><a href="{{ route('frontend.vision') }}"> الرؤية والرسالة </a></li>
                                    <li><a href="{{ route('frontend.values') }}"> القيم ومعانيها </a></li>
                                    <li><a href="{{ route('frontend.swat') }}"> التحليل الرباعي </a></li>
                                    <li><a href="{{ route('frontend.benciaries') }}"> المستفيدون </a></li>
                                    <li><a href="{{ route('frontend.stackholders') }}"> أصحاب المصحلة </a></li>
                                    <li><a href="{{ route('frontend.ben-trip') }}"> رحلة المستفيد </a></li>

                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">الحوكمة</a>
                                <ul class="sub-menu">
                                    @foreach ($hawkma_categories as $category)
                                        <li>
                                            <a href="{{ route('frontend.hawkma', $category) }}"><span>
                                                    {{ $category->name }}</span></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">المركز الاعلامي</a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('frontend.news') }}">الأخبار والمقالات</a></li>
                                    <li><a href="{{ route('frontend.gallery') }}">الصور</a></li>
                                    <li><a href="{{ route('frontend.videos') }}">الفيديو</a></li>

                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#"> التقارير</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="{{ route('frontend.reports', 'yearly') }}"><span> تقارير سنوية
                                            </span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('frontend.reports', 'money') }}"><span> تقارير مالية
                                            </span></a>
                                    </li>
                                </ul>
                            </li>

                            <li><a href="{{ route('frontend.projects') }}">مبادرتنا </a></li>
                            <li><a href="{{ route('frontend.supports') }}">لماذا تدعمنا</a></li>
                            <li><a href="{{ route('frontend.membership') }}">العضويات</a></li>


                            <li><a href="{{ route('frontend.contact') }}">تواصل معنا</a></li>
                        </ul>
                    </div><!-- end of nav-collapse -->



                </nav>
            </div>
        </header>
        @yield('content')

        <footer class="site-footer">
            <div class="upper-footer">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-4 col-md-4 col-sm-6">
                            <div class="widget about-widget">

                                <p class="just">{!! $setting->about_description !!}</p>
                                <div class="social-icons">
                                    <ul>
                                        @if ($setting->facebook)
                                            <li><a href="{{ $setting->facebook }}"><i class="ti-facebook"></i></a>
                                            </li>
                                        @endif

                                        @if ($setting->instagram)
                                            <li><a href="{{ $setting->instagram }}"><i class="ti-instagram"></i></a>
                                            </li>
                                        @endif

                                        @if ($setting->twitter)
                                            <li><a href="{{ $setting->twitter }}"><i class="ti-twitter-alt"></i></a>
                                            </li>
                                        @endif

                                        @if ($setting->linkedin)
                                            <li><a href="{{ $setting->linkedin }}"><i class="ti-linkedin"></i></a>
                                            </li>
                                        @endif

                                        @if ($setting->pinterest)
                                            <li><a href="{{ $setting->pinterest }}"><i class="ti-pinterest"></i></a>
                                            </li>
                                        @endif

                                        @if ($setting->youtubte)
                                            <li><a href="{{ $setting->youtubte }}"><i class="ti-youtube"></i></a>
                                            </li>
                                        @endif

                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col col-lg-4 col-md-4 col-sm-6">
                            <div class="widget link-widget">

                                <ul>
                                    <li><a href="{{ route('frontend.home') }}">الرئيسية </a></li>
                                    <li><a href="{{ route('frontend.about') }}">عن الجمعية</a></li>
                                    <li><a href="{{ route('frontend.vision') }}">الرؤية و الرسالة</a></li>
                                    <li><a href="{{ route('frontend.projects') }}">مشروعتنا</a></li>
                                    <li><a href="{{ route('frontend.benciaries') }}">الفئات المستفيدة</a></li>
                                </ul>
                                <ul>
                                    <li><a href="{{ route('frontend.values') }}">قيمنا </a></li>
                                    <li><a href="{{ route('frontend.contact') }}">تواصل معنا </a></li>
                                    <li><a href="{{ route('frontend.membership') }}">العضويات </a></li>
                                    <li><a href="{{ route('frontend.news') }}">أخبارنا</a></li>
                                    <li><a href="{{ route('frontend.ben-trip') }}">رحلة المستفيد </a></li>
                                </ul>
                            </div>
                        </div>


                        <div class="col col-lg-4 col-md-4 col-sm-6">
                            <div class="widget contact-widget service-link-widget">

                                <ul>
                                    <li>
                                        <div class="icon"><i class="fi flaticon-house"></i></div>
                                        {{ $setting->address }}
                                    </li>
                                    <li>
                                        <div class="icon"><i class="fi flaticon-call"></i></div><span>الجوال:</span>
                                        {{ $setting->phone }}
                                    </li>
                                    <li>
                                        <div class="icon"><i class="fi flaticon-email"></i></div><span>البريد
                                            الالكتروني:</span> {{ $setting->email }}
                                    </li>
                                    <li>
                                        <div class="icon"><i class="fi flaticon-alarm"></i></div><span> ساعات
                                            العمل:</span> {{ $setting->work_time }}
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div> <!-- end container -->
            </div>
            <div class="lower-footer">
                <div class="container">
                    <div class="row">
                        <div class="separator"></div>
                        <div class="col col-xs-12">
                            <p class="copyright text-center">
                                © 2024 جمعية التنمية الأسرية بصامطة تصميم و برمجة تكامل الرؤى.
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end site-footer -->
        </div>
        <!-- end of page-wrapper -->
        <!-- All JavaScript files
    ================================================== -->
        <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

        <!-- Plugins for this template -->
        <script src="{{ asset('frontend/assets/js/jquery-plugin-collection.js') }}"></script>

        <!-- Custom script for this template -->
        <script src="{{ asset('frontend/assets/js/script.js') }}"></script>
        @include('sweetalert::alert')
        @yield('scripts')

        <script>
            flatpickr(".date_picker", {
                dateFormat: "d/m/Y",
                locale: "ar" // لدعم اللغة العربية
            });
        </script>
        <script src="https://kit.fontawesome.com/02c22aec7b.js" crossorigin="anonymous"></script>
</body>

</html>
