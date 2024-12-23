@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.volunteer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.volunteers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.volunteer.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.volunteer.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.volunteer.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.volunteer.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone">{{ trans('cruds.volunteer.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}" required>
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.volunteer.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="identity">{{ trans('cruds.volunteer.fields.identity') }}</label>
                <input class="form-control {{ $errors->has('identity') ? 'is-invalid' : '' }}" type="text" name="identity" id="identity" value="{{ old('identity', '') }}" required>
                @if($errors->has('identity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('identity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.volunteer.fields.identity_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="skills">{{ trans('cruds.volunteer.fields.skills') }}</label>
                <textarea class="form-control {{ $errors->has('skills') ? 'is-invalid' : '' }}" name="skills" id="skills" required>{{ old('skills') }}</textarea>
                @if($errors->has('skills'))
                    <div class="invalid-feedback">
                        {{ $errors->first('skills') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.volunteer.fields.skills_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="experience">{{ trans('cruds.volunteer.fields.experience') }}</label>
                <textarea class="form-control {{ $errors->has('experience') ? 'is-invalid' : '' }}" name="experience" id="experience" required>{{ old('experience') }}</textarea>
                @if($errors->has('experience'))
                    <div class="invalid-feedback">
                        {{ $errors->first('experience') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.volunteer.fields.experience_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('volunteer_befor') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="volunteer_befor" id="volunteer_befor" value="1" required {{ old('volunteer_befor', 0) == 1 ? 'checked' : '' }}>
                    <label class="required form-check-label" for="volunteer_befor">{{ trans('cruds.volunteer.fields.volunteer_befor') }}</label>
                </div>
                @if($errors->has('volunteer_befor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('volunteer_befor') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.volunteer.fields.volunteer_befor_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="initiative_name">{{ trans('cruds.volunteer.fields.initiative_name') }}</label>
                <input class="form-control {{ $errors->has('initiative_name') ? 'is-invalid' : '' }}" type="text" name="initiative_name" id="initiative_name" value="{{ old('initiative_name', '') }}" required>
                @if($errors->has('initiative_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('initiative_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.volunteer.fields.initiative_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cv">{{ trans('cruds.volunteer.fields.cv') }}</label>
                <div class="needsclick dropzone {{ $errors->has('cv') ? 'is-invalid' : '' }}" id="cv-dropzone">
                </div>
                @if($errors->has('cv'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cv') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.volunteer.fields.cv_helper') }}</span>
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
    Dropzone.options.cvDropzone = {
    url: '{{ route('admin.volunteers.storeMedia') }}',
    maxFilesize: 40, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 40
    },
    success: function (file, response) {
      $('form').find('input[name="cv"]').remove()
      $('form').append('<input type="hidden" name="cv" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="cv"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($volunteer) && $volunteer->cv)
      var file = {!! json_encode($volunteer->cv) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="cv" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
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