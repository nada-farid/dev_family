@extends('frontend.layouts.main')
@section('content')
    @include('frontend.partials.breadcrumb', ['heading' => 'عن الجمعية', 'sub_heading' => ' قيمنا'])
    <!-- start faq-pg-section -->
    <div class="values section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                @foreach ($values as $value)
                    <div class="col-md-10">
                        <div class="value">
                            @if ($value->icon)
                                <div class="value-icon">
                                    <div class="pic"><img src="{{ $value->icon->getUrl() }}" /></div>
                                </div>
                            @endif
                            <div class="value-desc">
                                <h3>{{ $value->title }}</h3>
                                <p>{{ $value->description }}</p>

                            </div>
                            <div class="concerned">
                                المعنيون: <br />
                                {{ $value->beneficiar }}
                            </div>
                        </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
    <!-- end faq-pg-section -->
@endsection
