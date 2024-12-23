@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.saidAboutUs.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.said-about-uss.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.saidAboutUs.fields.id') }}
                        </th>
                        <td>
                            {{ $saidAboutUs->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.saidAboutUs.fields.name') }}
                        </th>
                        <td>
                            {{ $saidAboutUs->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.saidAboutUs.fields.position') }}
                        </th>
                        <td>
                            {{ $saidAboutUs->position }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.saidAboutUs.fields.review') }}
                        </th>
                        <td>
                            {{ $saidAboutUs->review }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.saidAboutUs.fields.image') }}
                        </th>
                        <td>
                            @if($saidAboutUs->image)
                                <a href="{{ $saidAboutUs->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $saidAboutUs->image->getUrl('thumb') }}">
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