@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.volunteerTask.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.volunteer-tasks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteerTask.fields.id') }}
                        </th>
                        <td>
                            {{ $volunteerTask->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteerTask.fields.volunteer') }}
                        </th>
                        <td>
                            {{ $volunteerTask->volunteer->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteerTask.fields.name') }}
                        </th>
                        <td>
                            {{ $volunteerTask->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteerTask.fields.address') }}
                        </th>
                        <td>
                            {{ $volunteerTask->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteerTask.fields.identity') }}
                        </th>
                        <td>
                            {{ $volunteerTask->identity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteerTask.fields.phone') }}
                        </th>
                        <td>
                            {{ $volunteerTask->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteerTask.fields.details') }}
                        </th>
                        <td>
                            {{ $volunteerTask->details }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteerTask.fields.visit_type') }}
                        </th>
                        <td>
                            {{ App\Models\VolunteerTask::VISIT_TYPE_SELECT[$volunteerTask->visit_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteerTask.fields.date') }}
                        </th>
                        <td>
                            {{ $volunteerTask->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteerTask.fields.arrive_time') }}
                        </th>
                        <td>
                            {{ $volunteerTask->arrive_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteerTask.fields.leave_time') }}
                        </th>
                        <td>
                            {{ $volunteerTask->leave_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteerTask.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\VolunteerTask::STATUS_SELECT[$volunteerTask->status] ?? '' }}
                        </td>
                    </tr> 
                    <tr>
                        <th>
                            {{ trans('cruds.volunteerTask.fields.notes') }}
                        </th>
                        <td>
                            {{ $volunteerTask->notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteerTask.fields.files') }}
                        </th>
                        <td>
                            @foreach($volunteerTask->files as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.volunteer-tasks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection