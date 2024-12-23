@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.setting.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.id') }}
                        </th>
                        <td>
                            {{ $setting->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.site_name') }}
                        </th>
                        <td>
                            {{ $setting->site_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.phone') }}
                        </th>
                        <td>
                            {{ $setting->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.address') }}
                        </th>
                        <td>
                            {{ $setting->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.email') }}
                        </th>
                        <td>
                            {{ $setting->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.facebook') }}
                        </th>
                        <td>
                            {{ $setting->facebook }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.twitter') }}
                        </th>
                        <td>
                            {{ $setting->twitter }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.linkedin') }}
                        </th>
                        <td>
                            {{ $setting->linkedin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.youtubte') }}
                        </th>
                        <td>
                            {{ $setting->youtubte }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.instagram') }}
                        </th>
                        <td>
                            {{ $setting->instagram }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.short_descrption') }}
                        </th>
                        <td>
                            {!! $setting->short_descrption !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.description') }}
                        </th>
                        <td>
                            {!! $setting->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.about_description') }}
                        </th>
                        <td>
                            {{ $setting->about_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.donation_url') }}
                        </th>
                        <td>
                            {{ $setting->donation_url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.about_photo') }}
                        </th>
                        <td>
                            @if($setting->about_photo)
                                <a href="{{ $setting->about_photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $setting->about_photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.inner_image') }}
                        </th>
                        <td>
                            @if($setting->inner_image)
                                <a href="{{ $setting->inner_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $setting->inner_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.logo') }}
                        </th>
                        <td>
                            @if($setting->logo)
                                <a href="{{ $setting->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $setting->logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.logo_white') }}
                        </th>
                        <td>
                            @if($setting->logo_white)
                                <a href="{{ $setting->logo_white->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $setting->logo_white->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.chairman_description') }}
                        </th>
                        <td>
                            {{ $setting->chairman_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.chairman_image') }}
                        </th>
                        <td>
                            @if($setting->chairman_image)
                                <a href="{{ $setting->chairman_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $setting->chairman_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.counter_1_text') }}
                        </th>
                        <td>
                            {{ $setting->counter_1_text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.counter_1_value') }}
                        </th>
                        <td>
                            {{ $setting->counter_1_value }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.counter_2_text') }}
                        </th>
                        <td>
                            {{ $setting->counter_2_text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.counter_2_value') }}
                        </th>
                        <td>
                            {{ $setting->counter_2_value }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.counter_3_text') }}
                        </th>
                        <td>
                            {{ $setting->counter_3_text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.counter_3_value') }}
                        </th>
                        <td>
                            {{ $setting->counter_3_value }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.counter_4_text') }}
                        </th>
                        <td>
                            {{ $setting->counter_4_text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.counter_4_value') }}
                        </th>
                        <td>
                            {{ $setting->counter_4_value }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.home_card_1_text') }}
                        </th>
                        <td>
                            {{ $setting->home_card_1_text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.home_card_2_text') }}
                        </th>
                        <td>
                            {{ $setting->home_card_2_text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.home_card_3_text') }}
                        </th>
                        <td>
                            {{ $setting->home_card_3_text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.work_time') }}
                        </th>
                        <td>
                            {{ $setting->work_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.pinterest') }}
                        </th>
                        <td>
                            {{ $setting->pinterest }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.vision') }}
                        </th>
                        <td>
                            {!! $setting->vision !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.mission') }}
                        </th>
                        <td>
                            {!! $setting->mission !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.values') }}
                        </th>
                        <td>
                            {!! $setting->values !!}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection