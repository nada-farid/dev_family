@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.stakeholder.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stakeholders.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.stakeholder.fields.id') }}
                        </th>
                        <td>
                            {{ $stakeholder->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stakeholder.fields.title') }}
                        </th>
                        <td>
                            {{ $stakeholder->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stakeholder.fields.description') }}
                        </th>
                        <td>
                            {!! $stakeholder->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stakeholder.fields.background_image') }}
                        </th>
                        <td>
                            @if($stakeholder->background_image)
                                <a href="{{ $stakeholder->background_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $stakeholder->background_image->getUrl('thumb') }}">
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