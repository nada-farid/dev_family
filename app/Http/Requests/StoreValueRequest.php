<?php

namespace App\Http\Requests;

use App\Models\Value;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreValueRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('value_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'beneficiar' => [
                'string',
                'required',
            ],
            'icon' => [
                'required',
            ],
        ];
    }

    public function messages()
    {
        return [
            'icon.required' => __('global.Please upload an image with required dimensions'),
        ];
    }

}
