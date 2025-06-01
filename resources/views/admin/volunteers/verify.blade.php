@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.volunteer.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.volunteers.verify_submit' ) }}" enctype="multipart/form-data"> 
                @csrf   
                <input type="hidden" name="id" value="{{ $volunteer->id }}" id="">
                <div class="form-group">
                    <label class="required" for="password">{{ trans('cruds.volunteer.fields.password') }}</label>
                    <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password"  required>
                    @if ($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.volunteer.fields.password_helper') }}</span>
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