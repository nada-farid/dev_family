@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.support.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.supports.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.support.fields.id') }}
                        </th>
                        <td>
                            {{ $support->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.support.fields.reason') }}
                        </th>
                        <td>
                            {{ $support->reason }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.support.fields.icon') }}
                        </th>
                        <td>
                            @if($support->icon)
                                <a href="{{ $support->icon->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $support->icon->getUrl('thumb') }}">
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