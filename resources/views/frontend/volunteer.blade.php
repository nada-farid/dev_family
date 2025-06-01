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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="contact-form-wrap">
                            @if ($errors->count() > 0)
                                <div class="alert alert-danger">
                                    <ul class="list-unstyled">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('frontend.volunteer.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-grp">

                                            <input type="text" placeholder="الاسم" required name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-grp">

                                            <input type="email" placeholder="البريد الالكتروني" required name="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-grp">

                                            <input type="text" placeholder="رقم الهوية" required name="identity_num">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-grp">

                                            <input type="text" placeholder="الهاتف" required name="phone_number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-grp">

                                            <input type="text" placeholder="الاهتمامات والطلبات" required
                                                name="interest">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-grp">

                                            <input type="text" placeholder=" اسم المبادرة" required
                                                name="initiative_name">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-grp">

                                            <input type="text" placeholder=" تجربتك التطوعية السابقة في دعم" required
                                                name="prev_experience">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="cv">السيرة الذاتية</label>
                                            <div class="needsclick dropzone {{ $errors->has('cv') ? 'is-invalid' : '' }}"
                                                id="cv-dropzone">
                                            </div>
                                        </div>
                                    </div>

                                    {{-- @include('partials.recaptcha') --}}
                                    <div class="submit-btn text-center mt-4">
                                        <button type="submit" class="btn">أرسال</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- end faq-pg-section -->

    <hr />
@endsection
@section('scripts')
    <script>
        Dropzone.options.cvDropzone = {
            url: '{{ route('frontend.volunteers.storeMedia') }}',
            maxFilesize: 2, // MB
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2
            },
            success: function(file, response) {
                $('form').find('input[name="cv"]').remove()
                $('form').append('<input type="hidden" name="cv" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="cv"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($volunteer) && $volunteer->cv)
                    var file = {!! json_encode($volunteer->cv) !!}
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="cv" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
@endsection
