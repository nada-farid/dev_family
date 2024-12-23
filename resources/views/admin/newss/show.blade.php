@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.news.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.newss.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.news.fields.id') }}
                            </th>
                            <td>
                                {{ $news->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.news.fields.name') }}
                            </th>
                            <td>
                                {{ $news->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.news.fields.image') }}
                            </th>
                            <td>
                                @if ($news->image)
                                    <a href="{{ $news->image->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $news->image->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.news.fields.date') }}
                            </th>
                            <td>
                                {{ $news->date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.news.fields.short_description') }}
                            </th>
                            <td>
                                {{ $news->short_description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.news.fields.description') }}
                            </th>
                            <td>
                                {!! $news->description !!}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.news.fields.inner_image') }}
                            </th>
                            <td>
                                {{ $news->inner_image }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.news.fields.address') }}
                            </th>
                            <td>
                                {{ $news->address }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.news.fields.insideImage') }}
                                {{ trans('cruds.' . $news->type . '.title_singular') }}
                            </th>
                            <td>
                                @if ($news->inside_image)
                                    <a href="{{ $news->inside_image->getUrl() }}" target="_blank"
                                        style="display: inline-block">
                                        <img src="{{ $news->inside_image->getUrl('thumb') }}">
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
