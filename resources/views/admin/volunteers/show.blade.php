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
                            {{ trans('cruds.volunteer.fields.email') }}
                        </th>
                        <td>
                            {{ $volunteer->email }}
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
                            {{ trans('cruds.volunteer.fields.phone') }}
                        </th>
                        <td>
                            {{ $volunteer->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteer.fields.identity') }}
                        </th>
                        <td>
                            {{ $volunteer->identity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteer.fields.skills') }}
                        </th>
                        <td>
                            {{ $volunteer->skills }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteer.fields.experience') }}
                        </th>
                        <td>
                            {{ $volunteer->experience }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteer.fields.volunteer_befor') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $volunteer->volunteer_befor ? 'checked' : '' }}>
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
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection