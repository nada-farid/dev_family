@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.beneficiary.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.beneficiaries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.id') }}
                        </th>
                        <td>
                            {{ $beneficiary->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.name') }}
                        </th>
                        <td>
                            {{ $beneficiary->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.description') }}
                        </th>
                        <td>
                            {{ $beneficiary->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.image') }}
                        </th>
                        <td>
                            @if($beneficiary->image)
                                <a href="{{ $beneficiary->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $beneficiary->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.precentatge') }}
                        </th>
                        <td>
                            {{ $beneficiary->precentatge }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection