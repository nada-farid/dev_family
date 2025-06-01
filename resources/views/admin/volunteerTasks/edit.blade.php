@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.volunteerTask.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.volunteer-tasks.update", [$volunteerTask->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="volunteer_id">{{ trans('cruds.volunteerTask.fields.volunteer') }}</label>
                <select class="form-control select2 {{ $errors->has('volunteer') ? 'is-invalid' : '' }}" name="volunteer_id" id="volunteer_id" required>
                    @foreach($volunteers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('volunteer_id') ? old('volunteer_id') : $volunteerTask->volunteer->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('volunteer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('volunteer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.volunteerTask.fields.volunteer_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.volunteerTask.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $volunteerTask->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.volunteerTask.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address">{{ trans('cruds.volunteerTask.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $volunteerTask->address) }}" required>
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.volunteerTask.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone">{{ trans('cruds.volunteerTask.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $volunteerTask->phone) }}" required>
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.volunteerTask.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="identity">{{ trans('cruds.volunteerTask.fields.identity') }}</label>
                <input class="form-control {{ $errors->has('identity') ? 'is-invalid' : '' }}" type="text" name="identity" id="identity" value="{{ old('identity', $volunteerTask->identity) }}" required>
                @if($errors->has('identity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('identity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.volunteerTask.fields.identity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="details">{{ trans('cruds.volunteerTask.fields.details') }}</label>
                <textarea class="form-control {{ $errors->has('details') ? 'is-invalid' : '' }}" name="details" id="details">{{ old('details', $volunteerTask->details) }}</textarea>
                @if($errors->has('details'))
                    <div class="invalid-feedback">
                        {{ $errors->first('details') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.volunteerTask.fields.details_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.volunteerTask.fields.visit_type') }}</label>
                <select class="form-control {{ $errors->has('visit_type') ? 'is-invalid' : '' }}" name="visit_type" id="visit_type" required>
                    <option value disabled {{ old('visit_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\VolunteerTask::VISIT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('visit_type', $volunteerTask->visit_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('visit_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('visit_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.volunteerTask.fields.visit_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.volunteerTask.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', $volunteerTask->date) }}" required>
                @if($errors->has('date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.volunteerTask.fields.date_helper') }}</span>
            </div>
              <div class="form-group">
                    <label class="required" for="link">{{ trans('cruds.volunteerTask.fields.link') }}</label>
                    <input class="form-control  {{ $errors->has('link') ? 'is-invalid' : '' }}" type="text"
                        name="link" id="link" value="{{ old('link', $volunteerTask->link) }}" required>
                    @if ($errors->has('link'))
                        <div class="invalid-feedback">
                            {{ $errors->first('link') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.volunteerTask.fields.link_helper') }}</span>
                </div>
            <div class="form-group">
                <label>{{ trans('cruds.volunteerTask.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\VolunteerTask::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $volunteerTask->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.volunteerTask.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cancel_reason">{{ trans('cruds.volunteerTask.fields.cancel_reason') }}</label>
                <textarea class="form-control {{ $errors->has('cancel_reason') ? 'is-invalid' : '' }}" name="cancel_reason" id="cancel_reason">{{ old('cancel_reason', $volunteerTask->cancel_reason) }}</textarea>
                @if($errors->has('cancel_reason'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cancel_reason') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.volunteerTask.fields.cancel_reason_helper') }}</span>
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