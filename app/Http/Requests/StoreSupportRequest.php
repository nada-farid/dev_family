<?php

namespace App\Http\Requests;

use App\Models\Support;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSupportRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('support_create');
    }

    public function rules()
    {
        return [
            'reason' => [
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
