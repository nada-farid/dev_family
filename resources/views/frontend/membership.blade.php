@extends('frontend.layouts.main')
@section('content')
    @include('frontend.partials.breadcrumb', [
        'heading' => 'العضويات',
        'sub_heading' => 'تسجيل عضو',
    ])
    <!-- start faq-pg-section -->

    <section class="mmbership blog-single-section ">
        <div class="container">
            <div class="comment-respond">

                <form method="post" id="commentform" class="comment-form" action="{{ route('frontend.membership.store') }}">
                    @csrf
                    <div class="row">
                        <div class="form-inputs">
                            <div class="col-md-12">
                                <input class="{{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required placeholder="الأسم">
                                @if($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input  placeholder="الجوال" class="{{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', '') }}" required>
                                @if($errors->has('phone_number'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('phone_number') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input class="{{ $errors->has('email') ? 'is-invalid' : '' }}"  placeholder="البريد الإلكتروني" type="text" name="email" id="email" value="{{ old('email', '') }}" required>
                                @if($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input class=" {{ $errors->has('job') ? 'is-invalid' : '' }}" type="text" name="job" id="job" value="{{ old('job', '') }}" placeholder="المهنة">
                                @if($errors->has('job'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('job') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input placeholder=" جهة العمل"  class=" {{ $errors->has('employer') ? 'is-invalid' : '' }}" type="text" name="employer" id="employer" value="{{ old('employer', '') }}">
                                @if($errors->has('employer'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('employer') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input class=" {{ $errors->has('identity_number') ? 'is-invalid' : '' }}"   placeholder="رقم الهوية" type="text" name="identity_number" id="identity_number" value="{{ old('identity_number', '') }}" required>
                                @if($errors->has('identity_number'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('identity_number') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input class="date_picker {{ $errors->has('identity_date') ? 'is-invalid' : '' }}"   placeholder=" تاريخها"  type="text" name="identity_date" id="identity_date" value="{{ old('identity_date') }}" required>
                                @if($errors->has('identity_date'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('identity_date') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input class="form-control {{ $errors->has('residence') ? 'is-invalid' : '' }}"  placeholder="مكان الإقامة" type="text" name="residence" id="residence" value="{{ old('residence', '') }}">
                                @if($errors->has('residence'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('residence') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input class="{{ $errors->has('neighborhood') ? 'is-invalid' : '' }}"  placeholder=" الحي" type="text" name="neighborhood" id="neighborhood" value="{{ old('neighborhood', '') }}">
                                @if($errors->has('neighborhood'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('neighborhood') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <select id="" name="type_id">
                                    <option value="" disabled>نوع العضوية</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-submit">
                        <input id="submit" value="طلب عضوية" type="submit">
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- end faq-pg-section -->

    <hr />
@endsection
