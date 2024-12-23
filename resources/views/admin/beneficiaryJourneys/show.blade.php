@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.beneficiaryJourney.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.beneficiary-journeys.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryJourney.fields.id') }}
                        </th>
                        <td>
                            {{ $beneficiaryJourney->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryJourney.fields.title') }}
                        </th>
                        <td>
                            {{ $beneficiaryJourney->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryJourney.fields.description') }}
                        </th>
                        <td>
                            {{ $beneficiaryJourney->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryJourney.fields.icon') }}
                        </th>
                        <td>
                            @if($beneficiaryJourney->icon)
                                <a href="{{ $beneficiaryJourney->icon->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $beneficiaryJourney->icon->getUrl('thumb') }}">
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