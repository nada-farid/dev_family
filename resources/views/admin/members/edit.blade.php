@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.member.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.members.update", [$member->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.member.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $member->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.member.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="job">{{ trans('cruds.member.fields.job') }}</label>
                <input class="form-control {{ $errors->has('job') ? 'is-invalid' : '' }}" type="text" name="job" id="job" value="{{ old('job', $member->job) }}">
                @if($errors->has('job'))
                    <div class="invalid-feedback">
                        {{ $errors->first('job') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.member.fields.job_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="employer">{{ trans('cruds.member.fields.employer') }}</label>
                <input class="form-control {{ $errors->has('employer') ? 'is-invalid' : '' }}" type="text" name="employer" id="employer" value="{{ old('employer', $member->employer) }}">
                @if($errors->has('employer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('employer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.member.fields.employer_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone_number">{{ trans('cruds.member.fields.phone_number') }}</label>
                <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $member->phone_number) }}" required>
                @if($errors->has('phone_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.member.fields.phone_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.member.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', $member->email) }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.member.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="identity_number">{{ trans('cruds.member.fields.identity_number') }}</label>
                <input class="form-control {{ $errors->has('identity_number') ? 'is-invalid' : '' }}" type="text" name="identity_number" id="identity_number" value="{{ old('identity_number', $member->identity_number) }}" required>
                @if($errors->has('identity_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('identity_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.member.fields.identity_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="identity_date">{{ trans('cruds.member.fields.identity_date') }}</label>
                <input class="form-control date {{ $errors->has('identity_date') ? 'is-invalid' : '' }}" type="text" name="identity_date" id="identity_date" value="{{ old('identity_date', $member->identity_date) }}" required>
                @if($errors->has('identity_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('identity_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.member.fields.identity_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="type_id">{{ trans('cruds.member.fields.type') }}</label>
                <select class="form-control select2 {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type_id" id="type_id" required>
                    @foreach($types as $id => $entry)
                        <option value="{{ $id }}" {{ (old('type_id') ? old('type_id') : $member->type->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.member.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_of_birth">{{ trans('cruds.member.fields.date_of_birth') }}</label>
                <input class="form-control date {{ $errors->has('date_of_birth') ? 'is-invalid' : '' }}" type="text" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth', $member->date_of_birth) }}">
                @if($errors->has('date_of_birth'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_of_birth') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.member.fields.date_of_birth_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="residence">{{ trans('cruds.member.fields.residence') }}</label>
                <input class="form-control {{ $errors->has('residence') ? 'is-invalid' : '' }}" type="text" name="residence" id="residence" value="{{ old('residence', $member->residence) }}">
                @if($errors->has('residence'))
                    <div class="invalid-feedback">
                        {{ $errors->first('residence') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.member.fields.residence_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="neighborhood">{{ trans('cruds.member.fields.neighborhood') }}</label>
                <input class="form-control {{ $errors->has('neighborhood') ? 'is-invalid' : '' }}" type="text" name="neighborhood" id="neighborhood" value="{{ old('neighborhood', $member->neighborhood) }}">
                @if($errors->has('neighborhood'))
                    <div class="invalid-feedback">
                        {{ $errors->first('neighborhood') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.member.fields.neighborhood_helper') }}</span>
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