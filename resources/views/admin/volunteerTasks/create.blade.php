@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.volunteerTask.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.volunteer-tasks.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="volunteer_id">{{ trans('cruds.volunteerTask.fields.volunteer') }}</label>
                    <select class="form-control select2 {{ $errors->has('volunteer') ? 'is-invalid' : '' }}"
                        name="volunteer_id" id="volunteer_id" required>
                        @foreach ($volunteers as $id => $entry)
                            <option value="{{ $id }}" {{ old('volunteer_id') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('volunteer'))
                        <div class="invalid-feedback">
                            {{ $errors->first('volunteer') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.volunteerTask.fields.volunteer_helper') }}</span>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="search">البحث في منصة المستفيدات</label>
                        <div style="display: flex">
                            <input class="form-control {{ $errors->has('search') ? 'is-invalid' : '' }}" type="text"
                                name="search" id="search">
                            <button class="btn btn-info" id="search-btn" type="button" onclick="search_for_beneficires()">
                                <span id="spinner" class="spinner-border spinner-border-sm" role="status"
                                    style="display:none"></span>
                                <span id="button-text">search</span>
                            </button>
                        </div>
                    </div>
                    <div class="form-group col-md-6" id="search-result">
                        <label>نتيجة البحث</label>
                        <select class="form-control select2" name="result" id="result">

                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label class="required" for="name">{{ trans('cruds.volunteerTask.fields.name') }}</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                            name="name" id="name" value="{{ old('name', '') }}" required>
                        @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.volunteerTask.fields.name_helper') }}</span>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="required" for="address">{{ trans('cruds.volunteerTask.fields.address') }}</label>
                        <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text"
                            name="address" id="address" value="{{ old('address', '') }}" required>
                        @if ($errors->has('address'))
                            <div class="invalid-feedback">
                                {{ $errors->first('address') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.volunteerTask.fields.address_helper') }}</span>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="required" for="phone">{{ trans('cruds.volunteerTask.fields.phone') }}</label>
                        <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text"
                            name="phone" id="phone" value="{{ old('phone', '') }}" required>
                        @if ($errors->has('phone'))
                            <div class="invalid-feedback">
                                {{ $errors->first('phone') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.volunteerTask.fields.phone_helper') }}</span>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="required" for="identity">{{ trans('cruds.volunteerTask.fields.identity') }}</label>
                        <input class="form-control {{ $errors->has('identity') ? 'is-invalid' : '' }}" type="text"
                            name="identity" id="identity" value="{{ old('identity', '') }}" required>
                        @if ($errors->has('identity'))
                            <div class="invalid-feedback">
                                {{ $errors->first('identity') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.volunteerTask.fields.identity_helper') }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="details">{{ trans('cruds.volunteerTask.fields.details') }}</label>
                    <textarea class="form-control {{ $errors->has('details') ? 'is-invalid' : '' }}" name="details" id="details">{{ old('details') }}</textarea>
                    @if ($errors->has('details'))
                        <div class="invalid-feedback">
                            {{ $errors->first('details') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.volunteerTask.fields.details_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required">{{ trans('cruds.volunteerTask.fields.visit_type') }}</label>
                    <select class="form-control {{ $errors->has('visit_type') ? 'is-invalid' : '' }}" name="visit_type"
                        id="visit_type" required>
                        <option value disabled {{ old('visit_type', null) === null ? 'selected' : '' }}>
                            {{ trans('global.pleaseSelect') }}</option>
                        @foreach (App\Models\VolunteerTask::VISIT_TYPE_SELECT as $key => $label)
                            <option value="{{ $key }}"
                                {{ old('visit_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('visit_type'))
                        <div class="invalid-feedback">
                            {{ $errors->first('visit_type') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.volunteerTask.fields.visit_type_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="date">{{ trans('cruds.volunteerTask.fields.date') }}</label>
                    <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text"
                        name="date" id="date" value="{{ old('date') }}" required>
                    @if ($errors->has('date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('date') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.volunteerTask.fields.date_helper') }}</span>
                </div>

                <div class="form-group">
                    <label class="required" for="link">{{ trans('cruds.volunteerTask.fields.link') }}</label>
                    <input class="form-control  {{ $errors->has('link') ? 'is-invalid' : '' }}" type="text"
                        name="link" id="link" value="{{ old('link') }}" required>
                    @if ($errors->has('link'))
                        <div class="invalid-feedback">
                            {{ $errors->first('link') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.volunteerTask.fields.link_helper') }}</span>
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
