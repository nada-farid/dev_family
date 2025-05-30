@extends('frontend.layouts.main')
@section('content')
    @include('frontend.partials.breadcrumb', [
        'heading' => 'التطوع',
        'sub_heading' => 'انضم كمتطوع',
    ])
    <!-- start faq-pg-section -->

    <section class="mmbership blog-single-section ">
        <div class="container">
            <div class="comment-respond">

                <form class="row needs-validation" novalidate method="POST" action="{{ route('frontend.volunteer.store') }}"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                name="name" id="volunteerName" value="{{ old('name') }}" placeholder="الاسم"
                                name="name" required />
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                name="email" id="volunteerEmail" placeholder="البريد الالكتروني" name="email" required
                                value="{{ old('email') }}" />
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <input type="text" class="form-control  {{ $errors->has('identity') ? 'is-invalid' : '' }}"
                                name="identity" id="volunteerNum" value="{{ old('identity') }}" placeholder="رقم الهوية"
                                required />
                            @if ($errors->has('identity'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('identity') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <input type="text" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                name="phone" value="{{ old('phone') }}" id="phone" placeholder="الهاتف" required />
                            @if ($errors->has('phone'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <input type="text" class="form-control {{ $errors->has('skills') ? 'is-invalid' : '' }}"
                                name="skills" value="{{ old('skills') }}" id="volunteerInter"
                                placeholder="الاهتمامات والطلبات" required />
                            @if ($errors->has('skills'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('skills') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <select name="initiative_name" id="initiative_name">
                                @foreach ($projects as $project)
                                    <option value="{{ $project->title }}"
                                        {{ old('initiative_name') == $project->title ? 'selected' : '' }}>
                                        {{ $project->title }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('initiative_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('initiative_name') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <input type="file" class="form-control  {{ $errors->has('cv') ? 'is-invalid' : '' }}"
                                name="cv" id="volunteerCV" placeholder=" رفع السيرة الذاتية " accept="files/*"
                                multiple="false" required="" />

                            @if ($errors->has('cv'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('cv') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <input type="text" name="experience" value="{{ old('experience') }}"
                                class="form-control  {{ $errors->has('experience') ? 'is-invalid' : '' }}" id="experience"
                                placeholder="خبراتك السابقة " required />
                            @if ($errors->has('experience'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('experience') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <div class="form-check {{ $errors->has('volunteer_befor') ? 'is-invalid' : '' }}">
                                <label class="required form-check-label" for="volunteer_befor"
                                    style="color:#ccc;font-weight:100">{{ trans('cruds.volunteer.fields.volunteer_befor') }}</label>
                                <input class="form-check-input" type="checkbox" name="volunteer_befor" id="volunteer_befor"
                                    value="1" required {{ old('volunteer_befor', 0) == 1 ? 'checked' : '' }}
                                    style="width:5%">

                            </div>
                            @if ($errors->has('volunteer_befor'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('volunteer_befor') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-submit ol-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <input id="submit" value="طلب تطوع" type="submit">
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- end faq-pg-section -->

    <hr />
@endsection
@section('scripts')
    <script>
        const fileInput = document.getElementById('volunteerCV');
        const fileNameDisplay = document.getElementById('fileName');

        fileInput.addEventListener('change', function() {
            if (fileInput.files.length > 0) {
                fileNameDisplay.textContent = fileInput.files[0].name;
            }
        });
    </script>
@endsection
