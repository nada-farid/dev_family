@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.volunteer.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.volunteers.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="g-recaptcha-response" value="0">
                <div class="form-group">
                    <label class="required" for="name">{{ trans('cruds.volunteer.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                        id="name" value="{{ old('name', '') }}" required>
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.volunteer.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="identity_num">{{ trans('cruds.volunteer.fields.identity_num') }}</label>
                    <input class="form-control {{ $errors->has('identity_num') ? 'is-invalid' : '' }}" type="text"
                        name="identity_num" id="identity_num" value="{{ old('identity_num', '') }}" required>
                    @if ($errors->has('identity_num'))
                        <div class="invalid-feedback">
                            {{ $errors->first('identity_num') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.volunteer.fields.identity_num_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="email">{{ trans('cruds.volunteer.fields.email') }}</label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                        name="email" id="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.volunteer.fields.email_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="phone_number">{{ trans('cruds.volunteer.fields.phone_number') }}</label>
                    <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text"
                        name="phone_number" id="phone_number" value="{{ old('phone_number', '') }}" required>
                    @if ($errors->has('phone_number'))
                        <div class="invalid-feedback">
                            {{ $errors->first('phone_number') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.volunteer.fields.phone_number_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="interest">{{ trans('cruds.volunteer.fields.interest') }}</label>
                    <input class="form-control {{ $errors->has('interest') ? 'is-invalid' : '' }}" type="text"
                        name="interest" id="interest" value="{{ old('interest', '') }}">
                    @if ($errors->has('interest'))
                        <div class="invalid-feedback">
                            {{ $errors->first('interest') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.volunteer.fields.interest_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="initiative_name">{{ trans('cruds.volunteer.fields.initiative_name') }}</label>
                    <input class="form-control {{ $errors->has('initiative_name') ? 'is-invalid' : '' }}" type="text"
                        name="initiative_name" id="initiative_name" value="{{ old('initiative_name', '') }}">
                    @if ($errors->has('initiative_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('initiative_name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.volunteer.fields.initiative_name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="prev_experience">{{ trans('cruds.volunteer.fields.prev_experience') }}</label>
                    <input class="form-control {{ $errors->has('prev_experience') ? 'is-invalid' : '' }}" type="text"
                        name="prev_experience" id="prev_experience" value="{{ old('prev_experience', '') }}">
                    @if ($errors->has('prev_experience'))
                        <div class="invalid-feedback">
                            {{ $errors->first('prev_experience') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.volunteer.fields.prev_experience_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="cv">{{ trans('cruds.volunteer.fields.cv') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('cv') ? 'is-invalid' : '' }}" id="cv-dropzone">
                    </div>
                    @if ($errors->has('cv'))
                        <div class="invalid-feedback">
                            {{ $errors->first('cv') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.volunteer.fields.cv_helper') }}</span>
                </div>  
                <div class="form-group">
                    <label class="required" for="photo">{{ trans('cruds.volunteer.fields.photo') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                    </div>
                    @if($errors->has('photo'))
                        <div class="invalid-feedback">
                            {{ $errors->first('photo') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.volunteer.fields.photo_helper') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        Dropzone.options.photoDropzone = {
            url: '{{ route('admin.volunteers.storeMedia') }}',
            maxFilesize: 2, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2,
                width: 4096,
                height: 4096
            },
            success: function(file, response) {
                $('form').find('input[name="photo"]').remove()
                $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="photo"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($volunteer) && $volunteer->photo)
                    var file = {!! json_encode($volunteer->photo) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
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
    <script>
        Dropzone.options.cvDropzone = {
            url: '{{ route('admin.volunteers.storeMedia') }}',
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
