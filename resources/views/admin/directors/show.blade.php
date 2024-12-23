@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.director.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.directors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.director.fields.id') }}
                        </th>
                        <td>
                            {{ $director->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.director.fields.name') }}
                        </th>
                        <td>
                            {{ $director->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.director.fields.position') }}
                        </th>
                        <td>
                            {{ $director->position }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.director.fields.image') }}
                        </th>
                        <td>
                            @if($director->image)
                                <a href="{{ $director->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $director->image->getUrl('thumb') }}">
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