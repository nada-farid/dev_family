<?php

namespace App\Http\Requests;

use App\Models\Setting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('setting_create');
    }

    public function rules()
    {
        return [
            'site_name' => [
                'string',
                'nullable',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'email' => [
                'string',
                'nullable',
            ],
            'facebook' => [
                'string',
                'nullable',
            ],
            'twitter' => [
                'string',
                'nullable',
            ],
            'linkedin' => [
                'string',
                'nullable',
            ],
            'youtubte' => [
                'string',
                'nullable',
            ],
            'instagram' => [
                'string',
                'nullable',
            ],
            'chairman_description' => [
                'string',
                'nullable',
            ],
            'donation_url' => [
                'string',
                'nullable',
            ],
            'counter_1_text' => [
                'string',
                'nullable',
            ],
            'counter_1_value' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'counter_2_text' => [
                'string',
                'nullable',
            ],
            'counter_2_value' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'counter_3_text' => [
                'string',
                'nullable',
            ],
            'counter_3_value' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'counter_4_text' => [
                'string',
                'nullable',
            ],
            'counter_4_value' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'home_card_1_text' => [
                'required',
            ],
            'home_card_2_text' => [
                'required',
            ],
            'home_card_3_text' => [
                'required',
            ],
            'work_time' => [
                'string',
                'required',
            ],
            'pinterest' => [
                'string',
                'nullable',
            ],
        ];
    }
}
