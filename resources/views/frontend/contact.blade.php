@extends('frontend.layouts.main')
@section('content')
    @include('frontend.partials.breadcrumb', [
        'heading' => 'تواصل معنا',
        'sub_heading' => 'تواصل معنا',
    ])

    <!-- start contact-section -->
    <section class="contact-section section-padding">
        <div class="container">
            <div class="row">

                <div class="col col-xs-12">
                    <div class="contact-info-grids">
                        <div class="grid">
                            <i class="fi flaticon-house"></i>
                            <h4>العنوان</h4>
                            <p>{{ $setting->address }}</p>
                        </div>
                        <div class="grid">
                            <i class="fi flaticon-email"></i>
                            <h4>البريد الالكتروني</h4>
                            <p>{{ $setting->email }} <br><br></p>
                        </div>
                        <div class="grid">
                            <i class="fi flaticon-call"></i>
                            <h4>الجوال</h4>
                            <p style="direction:ltr;">{{ $setting->phone }} <br> <br></p>
                        </div>
                        <div class="grid">
                            <i class="fi flaticon-alarm"></i>
                            <h4> ساعات العمل</h4>
                            <p>{{ $setting->work_time }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-form-area">
                <div class="row">
                    <div class="col col-md-4">
                        <div class="contact-text">
                            <h3> أذا كان لديك اي استفسارات من فضلك املا الفورم التالي</h3>
                        </div>
                    </div>
                    <div class="col col-md-8">
                        <div class="contact-form">
                            <form method="post" action="{{route('frontend.contact.store')}}" class="contact-validation-active">
                                @csrf
                                <div>
                                    <input name="name" type="text"
                                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name"
                                        id="name" placeholder="الاسم*">
                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <input name="email" type="email"
                                        class="form-control  {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email"
                                        id="email" placeholder="البريد الالكتروني*">
                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <input name="phone_number" type="text"
                                        class="form-control  {{ $errors->has('phone_number') ? 'is-invalid' : '' }}"
                                        name="phone" id="phone" placeholder="الجوال*">
                                    @if ($errors->has('phone_number'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('phone_number') }}
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <select name="type"
                                        class="form-control  {{ $errors->has('type') ? 'is-invalid' : '' }}">
                                        <option disabled="disabled" selected>الموضوع</option>
                                        @foreach (App\Models\Contact::TYPE_SELECT as $key => $label)
                                            <option value="{{ $key }}">
                                                {{ trans('global.' . $label) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="fullwidth">
                                    <textarea name="message" class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" name="message"
                                        id="note" placeholder="الموضوع ..."></textarea>
                                    @if ($errors->has('message'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('message') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="submit-area">
                                    <button type="submit" class="btn btn-more"><i
                                            class="fi flaticon-like"></i>إرسال</button>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end contact-section -->
    <!--  start contact-map -->
    <section class="contact-map-section">
        <h2 class="hidden">Contact map</h2>
        <div class="contact-map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14946570.97921168!2d34.4243585!3d23.8518191!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15e7b33fe7952a41%3A0x5960504bc21ab69b!2sSaudi%20Arabia!5e0!3m2!1sen!2seg!4v1731787286706!5m2!1sen!2seg"
                allowfullscreen></iframe>
        </div>
    </section>
    <!-- end contact-map -->
@endsection
