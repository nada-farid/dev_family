@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.volunteer.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.volunteers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteer.fields.id') }}
                        </th>
                        <td>
                            {{ $volunteer->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteer.fields.name') }}
                        </th>
                        <td>
                            {{ $volunteer->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteer.fields.identity_num') }}
                        </th>
                        <td>
                            {{ $volunteer->identity_num }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteer.fields.email') }}
                        </th>
                        <td>
                            {{ $volunteer->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteer.fields.phone_number') }}
                        </th>
                        <td>
                            {{ $volunteer->phone_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteer.fields.interest') }}
                        </th>
                        <td>
                            {{ $volunteer->interest }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteer.fields.initiative_name') }}
                        </th>
                        <td>
                            {{ $volunteer->initiative_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteer.fields.prev_experience') }}
                        </th>
                        <td>
                            {{ $volunteer->prev_experience }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteer.fields.cv') }}
                        </th>
                        <td>
                            @if($volunteer->cv)
                                <a href="{{ $volunteer->cv->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteer.fields.photo') }}
                        </th>
                        <td>
                            @if($volunteer->photo)
                                <a href="{{ $volunteer->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $volunteer->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.volunteers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection