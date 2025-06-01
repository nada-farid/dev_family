@extends('layouts.volunteer')
@section('styles')
    <style>
        .badge-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .header-svg {
            width: 100%;
        }

        .footer-svg {
            width: 100%;
        }

        .qr-code img {
            width: 150px;
            height: 150px;
        }

        .volunteer-name {
            font-size: 24px;
            font-weight: bold;
            color: #d6a954;
            margin-top: 10px;
        }

        .details {
            font-size: 16px;
            color: #777;
            margin: 5px 0;
        }

        .dates {
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
@endsection
@section('content')
    @php
        $site_settings = \App\Models\Setting::first();
    @endphp
    <div class="badge-card">
        <!-- Header SVG -->
        <div class="header-svg">
            @if ($setting->logo)
                <img src="{{ $setting->logo->getUrl() }}" alt="" style="position: absolute;width:180px; left: 39% ">
            @endif
            <svg style="width: 400px" viewBox="0 0 436 158" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M237.818 92.1017C138.192 69.8703 63.2039 85.7499 0 113.275V0H436V74.1049C368.297 105.441 267.813 98.795 237.818 92.1017Z"
                    fill="#BA9A56" />
                <path
                    d="M226.549 103.911C120.541 84.248 31.3464 125.64 0 148.793V157.342C85.4902 101.774 186.654 98.5677 226.549 103.911Z"
                    fill="#BA9A56" />
                <path
                    d="M228.686 97.499C129.304 75.058 37.0458 106.76 0 125.283V137.038C84.4216 83.607 191.284 91.4329 228.686 97.499Z"
                    fill="#BA9A56" />
                <path
                    d="M255.402 99.3825C353.716 111.137 403.941 95.108 436 82.2844V90.8334C364.402 112.206 285.323 106.863 255.402 99.3825Z"
                    fill="#BA9A56" />
                <path
                    d="M254.333 105.794C335.549 122.892 409.284 110.069 436 99.3823V110.069C350.51 128.235 277.843 112.206 254.333 105.794Z"
                    fill="#BA9A56" />
            </svg>
        </div>

        <!-- Badge Title -->
        <h4 class="mt-3">الهوية الرقمية لمتطوع جمعية التنمية <br> الأسرية بصامطة</h4>

        <!-- QR Code -->
        <div class="qr-code mt-3">
            {!! QrCode::size(150)->generate(route('volunteer_qr', encrypt($volunteerTask->id))) !!}
        </div>

        <!-- Volunteer Name -->
        <div class="volunteer-name">{{ $volunteerTask->volunteer->name ?? '' }}</div>

        <!-- Details -->
        <div class="details">
            <strong>المكان:</strong> {{ $volunteerTask->address ?? '' }}<br />
            <strong>المستفيد:</strong> {{ $volunteerTask->name ?? '' }}
        </div>

        <!-- Dates -->
        <div class="dates">
            <strong>التاريخ:</strong> {{ $volunteerTask->date ?? '' }}
        </div>

        <!-- Footer SVG -->
        <div class="footer-svg mt-3" style="position: relative">
            <!-- Footer Text -->
            <small class="d-block mt-2" style=" position: absolute; left: 44%; bottom: 4px; color: white;">يستخدم فقط لمهام
                جمعية التنمية الأسرية</small>
            <svg style="width: 400px" viewBox="0 0 436 89" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M275.706 48.9288C355.853 49.7431 415.696 18.3855 436 0.568604V18.3855C355.853 59.3431 321.657 55.0686 275.706 48.9288Z"
                    fill="#BA9A56" />
                <path
                    d="M0 44.2342V60.4118C110.069 10.3189 195.559 37.2816 209.451 39.9779C123.106 3.30888 34.1961 31.8889 0 44.2342Z"
                    fill="#BA9A56" />
                <path
                    d="M0 72.4581V88.1961H436V30.4902C367.775 64.0646 314.472 64.5858 270.765 56.7179C127.919 31.0033 76.7531 33.1132 0 72.4581Z"
                    fill="#BA9A56" />
            </svg>
        </div>

    </div>
@endsection
