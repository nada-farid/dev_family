@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.value.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.values.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.value.fields.id') }}
                        </th>
                        <td>
                            {{ $value->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.value.fields.title') }}
                        </th>
                        <td>
                            {{ $value->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.value.fields.description') }}
                        </th>
                        <td>
                            {{ $value->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.value.fields.beneficiar') }}
                        </th>
                        <td>
                            {{ $value->beneficiar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.value.fields.icon') }}
                        </th>
                        <td>
                            @if($value->icon)
                                <a href="{{ $value->icon->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $value->icon->getUrl('thumb') }}">
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