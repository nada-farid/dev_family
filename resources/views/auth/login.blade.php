<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="irstheme">

    <title>جمعية التنمية الأسرية بصامطة</title>


    <link href="{{ asset('frontend/assets/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/flaticon.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/02c22aec7b.js" crossorigin="anonymous"></script>

    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">

    <style>
        .logo {
            margin: 0 auto;
            text-align: center;
        }

        body {
            padding: 0;
            margin: 0;
            background-image: url("{{ asset('frontend/assets/images/news_bg.jpg') }}");
            background-repeat: no-repeat;
            background-position: center center;
            font-family: "Cairo", serif;
            direction: rtl;
        }

        .vid-container {
            position: relative;
            height: 100vh;
            overflow: hidden;
        }

        .bgvid.back {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -100;
        }

        .inner {
            position: absolute;
        }

        .inner-container {
            width: 400px;
            height: 500px;
            position: absolute;
            top: calc(50vh - 250px);
            left: calc(50vw - 200px);
            overflow: hidden;
        }



        .box {
            position: absolute;
            height: 100%;
            width: 100%;
            font-family: "Cairo", serif;
            color: #fff;
            background: #75cac0;
            padding: 30px 0px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }

        .box h1 {
            text-align: center;
            margin: 30px 0;
            font-size: 30px;
        }

        .box input {
            display: block;
            width: 300px;
            margin: 20px auto;
            padding: 15px;
            color: #fff;
            border: 0;
            font-family: "Cairo", serif;
        }

        .box input:focus,
        .box input:active,
        .box button:focus,
        .box button:active {
            outline: none;
        }

        .box button {
            background: #033d33;
            border: 0;
            color: #fff;
            padding: 10px;
            font-size: 20px;
            width: 330px;
            margin: 20px auto;
            display: block;
            cursor: pointer;
            font-family: "Cairo", serif;
        }

        .box button:active {
            background: #27ae60;
        }

        .box p {
            font-size: 14px;
            text-align: center;
        }

        .box p span {
            cursor: pointer;
            color: #666;
        }
    </style>
</head>

<body>



    <div class="vid-container">
        <div class="logo"><img src="{{ asset('frontend/assets/images/logo_white.png') }}" width="200"
                alt=""></div>

        <div class="inner-container">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="box">
                    <h1>تسجيل الدخول</h1>
                    <input name="email" type="text" placeholder="البريد الالكتروني" />
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                    <input type="password" name="password" placeholder="كلمة المرور" />
                    @if ($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                    <button type="submit">تسجيل دخول</button>
                    {{-- <p><span>مستخدم جديد</span> ?غير مسجل </p> --}}
                </div>
            </form>
        </div>
    </div>
</body>

</html>
