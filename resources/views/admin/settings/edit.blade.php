@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.setting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.settings.update", [$setting->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="site_name">{{ trans('cruds.setting.fields.site_name') }}</label>
                <input class="form-control {{ $errors->has('site_name') ? 'is-invalid' : '' }}" type="text" name="site_name" id="site_name" value="{{ old('site_name', $setting->site_name) }}">
                @if($errors->has('site_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('site_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.site_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.setting.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $setting->phone) }}">
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.setting.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $setting->address) }}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.setting.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', $setting->email) }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="facebook">{{ trans('cruds.setting.fields.facebook') }}</label>
                <input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" type="text" name="facebook" id="facebook" value="{{ old('facebook', $setting->facebook) }}">
                @if($errors->has('facebook'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facebook') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.facebook_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="twitter">{{ trans('cruds.setting.fields.twitter') }}</label>
                <input class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}" type="text" name="twitter" id="twitter" value="{{ old('twitter', $setting->twitter) }}">
                @if($errors->has('twitter'))
                    <div class="invalid-feedback">
                        {{ $errors->first('twitter') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.twitter_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="linkedin">{{ trans('cruds.setting.fields.linkedin') }}</label>
                <input class="form-control {{ $errors->has('linkedin') ? 'is-invalid' : '' }}" type="text" name="linkedin" id="linkedin" value="{{ old('linkedin', $setting->linkedin) }}">
                @if($errors->has('linkedin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('linkedin') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.linkedin_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="youtubte">{{ trans('cruds.setting.fields.youtubte') }}</label>
                <input class="form-control {{ $errors->has('youtubte') ? 'is-invalid' : '' }}" type="text" name="youtubte" id="youtubte" value="{{ old('youtubte', $setting->youtubte) }}">
                @if($errors->has('youtubte'))
                    <div class="invalid-feedback">
                        {{ $errors->first('youtubte') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.youtubte_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instagram">{{ trans('cruds.setting.fields.instagram') }}</label>
                <input class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}" type="text" name="instagram" id="instagram" value="{{ old('instagram', $setting->instagram) }}">
                @if($errors->has('instagram'))
                    <div class="invalid-feedback">
                        {{ $errors->first('instagram') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.instagram_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pinterest">{{ trans('cruds.setting.fields.pinterest') }}</label>
                <input class="form-control {{ $errors->has('pinterest') ? 'is-invalid' : '' }}" type="text" name="pinterest" id="pinterest" value="{{ old('pinterest', $setting->pinterest) }}">
                @if($errors->has('pinterest'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pinterest') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.pinterest_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="about_description">{{ trans('cruds.setting.fields.about_description') }}</label>
                <textarea class="form-control {{ $errors->has('about_description') ? 'is-invalid' : '' }}" name="about_description" id="about_description">{{ old('about_description', $setting->about_description) }}</textarea>
                @if($errors->has('about_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('about_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.about_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="short_descrption">{{ trans('cruds.setting.fields.short_descrption') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('short_descrption') ? 'is-invalid' : '' }}" name="short_descrption" id="short_descrption">{!! old('short_descrption', $setting->short_descrption) !!}</textarea>
                @if($errors->has('short_descrption'))
                    <div class="invalid-feedback">
                        {{ $errors->first('short_descrption') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.short_descrption_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.setting.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description', $setting->description) !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="donation_url">{{ trans('cruds.setting.fields.donation_url') }}</label>
                <input class="form-control {{ $errors->has('donation_url') ? 'is-invalid' : '' }}" type="text" name="donation_url" id="donation_url" value="{{ old('donation_url', $setting->donation_url) }}">
                @if($errors->has('donation_url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('donation_url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.donation_url_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="about_photo">{{ trans('cruds.setting.fields.about_photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('about_photo') ? 'is-invalid' : '' }}" id="about_photo-dropzone">
                </div>
                @if($errors->has('about_photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('about_photo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.about_photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="inner_image">{{ trans('cruds.setting.fields.inner_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('inner_image') ? 'is-invalid' : '' }}" id="inner_image-dropzone">
                </div>
                @if($errors->has('inner_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('inner_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.inner_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="logo">{{ trans('cruds.setting.fields.logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo-dropzone">
                </div>
                @if($errors->has('logo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('logo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.logo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="logo_white">{{ trans('cruds.setting.fields.logo_white') }}</label>
                <div class="needsclick dropzone {{ $errors->has('logo_white') ? 'is-invalid' : '' }}" id="logo_white-dropzone">
                </div>
                @if($errors->has('logo_white'))
                    <div class="invalid-feedback">
                        {{ $errors->first('logo_white') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.logo_white_helper') }}</span>
            </div>
            {{-- <div class="form-group">
                <label for="chairman_description">{{ trans('cruds.setting.fields.chairman_description') }}</label>
                <input class="form-control {{ $errors->has('chairman_description') ? 'is-invalid' : '' }}" type="text" name="chairman_description" id="chairman_description" value="{{ old('chairman_description', $setting->chairman_description) }}">
                @if($errors->has('chairman_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('chairman_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.chairman_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="chairman_image">{{ trans('cruds.setting.fields.chairman_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('chairman_image') ? 'is-invalid' : '' }}" id="chairman_image-dropzone">
                </div>
                @if($errors->has('chairman_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('chairman_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.chairman_image_helper') }}</span>
            </div> --}}
            {{-- <div class="form-group">
                <label for="counter_1_text">{{ trans('cruds.setting.fields.counter_1_text') }}</label>
                <input class="form-control {{ $errors->has('counter_1_text') ? 'is-invalid' : '' }}" type="text" name="counter_1_text" id="counter_1_text" value="{{ old('counter_1_text', $setting->counter_1_text) }}">
                @if($errors->has('counter_1_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('counter_1_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.counter_1_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="counter_1_value">{{ trans('cruds.setting.fields.counter_1_value') }}</label>
                <input class="form-control {{ $errors->has('counter_1_value') ? 'is-invalid' : '' }}" type="number" name="counter_1_value" id="counter_1_value" value="{{ old('counter_1_value', $setting->counter_1_value) }}" step="1">
                @if($errors->has('counter_1_value'))
                    <div class="invalid-feedback">
                        {{ $errors->first('counter_1_value') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.counter_1_value_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="counter_2_text">{{ trans('cruds.setting.fields.counter_2_text') }}</label>
                <input class="form-control {{ $errors->has('counter_2_text') ? 'is-invalid' : '' }}" type="text" name="counter_2_text" id="counter_2_text" value="{{ old('counter_2_text', $setting->counter_2_text) }}">
                @if($errors->has('counter_2_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('counter_2_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.counter_2_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="counter_2_value">{{ trans('cruds.setting.fields.counter_2_value') }}</label>
                <input class="form-control {{ $errors->has('counter_2_value') ? 'is-invalid' : '' }}" type="number" name="counter_2_value" id="counter_2_value" value="{{ old('counter_2_value', $setting->counter_2_value) }}" step="1">
                @if($errors->has('counter_2_value'))
                    <div class="invalid-feedback">
                        {{ $errors->first('counter_2_value') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.counter_2_value_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="counter_3_text">{{ trans('cruds.setting.fields.counter_3_text') }}</label>
                <input class="form-control {{ $errors->has('counter_3_text') ? 'is-invalid' : '' }}" type="text" name="counter_3_text" id="counter_3_text" value="{{ old('counter_3_text', $setting->counter_3_text) }}">
                @if($errors->has('counter_3_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('counter_3_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.counter_3_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="counter_3_value">{{ trans('cruds.setting.fields.counter_3_value') }}</label>
                <input class="form-control {{ $errors->has('counter_3_value') ? 'is-invalid' : '' }}" type="number" name="counter_3_value" id="counter_3_value" value="{{ old('counter_3_value', $setting->counter_3_value) }}" step="1">
                @if($errors->has('counter_3_value'))
                    <div class="invalid-feedback">
                        {{ $errors->first('counter_3_value') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.counter_3_value_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="counter_4_text">{{ trans('cruds.setting.fields.counter_4_text') }}</label>
                <input class="form-control {{ $errors->has('counter_4_text') ? 'is-invalid' : '' }}" type="text" name="counter_4_text" id="counter_4_text" value="{{ old('counter_4_text', $setting->counter_4_text) }}">
                @if($errors->has('counter_4_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('counter_4_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.counter_4_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="counter_4_value">{{ trans('cruds.setting.fields.counter_4_value') }}</label>
                <input class="form-control {{ $errors->has('counter_4_value') ? 'is-invalid' : '' }}" type="number" name="counter_4_value" id="counter_4_value" value="{{ old('counter_4_value', $setting->counter_4_value) }}" step="1">
                @if($errors->has('counter_4_value'))
                    <div class="invalid-feedback">
                        {{ $errors->first('counter_4_value') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.counter_4_value_helper') }}</span>
            </div> --}}
            <div class="form-group">
                <label class="required" for="home_card_1_text">{{ trans('cruds.setting.fields.home_card_1_text') }}</label>
                <textarea class="form-control {{ $errors->has('home_card_1_text') ? 'is-invalid' : '' }}" name="home_card_1_text" id="home_card_1_text" required>{{ old('home_card_1_text', $setting->home_card_1_text) }}</textarea>
                @if($errors->has('home_card_1_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('home_card_1_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.home_card_1_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="home_card_2_text">{{ trans('cruds.setting.fields.home_card_2_text') }}</label>
                <textarea class="form-control {{ $errors->has('home_card_2_text') ? 'is-invalid' : '' }}" name="home_card_2_text" id="home_card_2_text" required>{{ old('home_card_2_text', $setting->home_card_2_text) }}</textarea>
                @if($errors->has('home_card_2_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('home_card_2_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.home_card_2_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="home_card_3_text">{{ trans('cruds.setting.fields.home_card_3_text') }}</label>
                <textarea class="form-control {{ $errors->has('home_card_3_text') ? 'is-invalid' : '' }}" name="home_card_3_text" id="home_card_3_text" required>{{ old('home_card_3_text', $setting->home_card_3_text) }}</textarea>
                @if($errors->has('home_card_3_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('home_card_3_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.home_card_3_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="work_time">{{ trans('cruds.setting.fields.work_time') }}</label>
                <input class="form-control {{ $errors->has('work_time') ? 'is-invalid' : '' }}" type="text" name="work_time" id="work_time" value="{{ old('work_time', $setting->work_time) }}" required>
                @if($errors->has('work_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('work_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.work_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vision">{{ trans('cruds.setting.fields.vision') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('vision') ? 'is-invalid' : '' }}" name="vision" id="vision">{!! old('vision', $setting->vision) !!}</textarea>
                @if($errors->has('vision'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vision') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.vision_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mission">{{ trans('cruds.setting.fields.mission') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('mission') ? 'is-invalid' : '' }}" name="mission" id="mission">{!! old('mission', $setting->mission) !!}</textarea>
                @if($errors->has('mission'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mission') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.mission_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="values">{{ trans('cruds.setting.fields.values') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('values') ? 'is-invalid' : '' }}" name="values" id="values">{!! old('values', $setting->values) !!}</textarea>
                @if($errors->has('values'))
                    <div class="invalid-feedback">
                        {{ $errors->first('values') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.values_helper') }}</span>
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
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.settings.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $setting->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    Dropzone.options.aboutPhotoDropzone = {
    url: '{{ route('admin.settings.storeMedia') }}',
    maxFilesize: 4, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 4,
      width: 488,
      height: 673
    },
    success: function (file, response) {
      $('form').find('input[name="about_photo"]').remove()
      $('form').append('<input type="hidden" name="about_photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="about_photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($setting) && $setting->about_photo)
      var file = {!! json_encode($setting->about_photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="about_photo" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.innerImageDropzone = {
    url: '{{ route('admin.settings.storeMedia') }}',
    maxFilesize: 40, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 40,
      width: 1920,
      height: 600
    },
    success: function (file, response) {
      $('form').find('input[name="inner_image"]').remove()
      $('form').append('<input type="hidden" name="inner_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="inner_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($setting) && $setting->inner_image)
      var file = {!! json_encode($setting->inner_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="inner_image" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.logoDropzone = {
    url: '{{ route('admin.settings.storeMedia') }}',
    maxFilesize: 40, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 40,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="logo"]').remove()
      $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($setting) && $setting->logo)
      var file = {!! json_encode($setting->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.logoWhiteDropzone = {
    url: '{{ route('admin.settings.storeMedia') }}',
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
    success: function (file, response) {
      $('form').find('input[name="logo_white"]').remove()
      $('form').append('<input type="hidden" name="logo_white" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo_white"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($setting) && $setting->logo_white)
      var file = {!! json_encode($setting->logo_white) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo_white" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.chairmanImageDropzone = {
    url: '{{ route('admin.settings.storeMedia') }}',
    maxFilesize: 40, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 40,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="chairman_image"]').remove()
      $('form').append('<input type="hidden" name="chairman_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="chairman_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($setting) && $setting->chairman_image)
      var file = {!! json_encode($setting->chairman_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="chairman_image" value="' + file.file_name + '">')
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