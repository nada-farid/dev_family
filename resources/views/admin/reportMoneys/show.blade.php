@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.reportMoney.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.report-moneys.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.reportMoney.fields.id') }}
                        </th>
                        <td>
                            {{ $reportMoney->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reportMoney.fields.part') }}
                        </th>
                        <td>
                            {{ App\Models\ReportMoney::PART_SELECT[$reportMoney->part] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reportMoney.fields.year') }}
                        </th>
                        <td>
                            {{ $reportMoney->year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reportMoney.fields.link') }}
                        </th>
                        <td>
                            {{ $reportMoney->link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reportMoney.fields.published') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $reportMoney->published ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reportMoney.fields.file') }}
                        </th>
                        <td>
                            @if($reportMoney->file)
                                <a href="{{ $reportMoney->file->getUrl() }}" target="_blank">
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