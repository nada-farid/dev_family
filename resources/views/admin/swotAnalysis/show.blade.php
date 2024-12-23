@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.swotAnalysi.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.swot-analysis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.swotAnalysi.fields.id') }}
                        </th>
                        <td>
                            {{ $swotAnalysi->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.swotAnalysi.fields.title') }}
                        </th>
                        <td>
                            {{ $swotAnalysi->title }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection