<?php

namespace App\Http\Requests;

use App\Models\Beneficiary;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBeneficiaryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('beneficiary_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'description' => [
                'required',
            ],
            'image' => [
                'required',
            ],
            'precentatge' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }

    public function messages()
    {
        return [
            'image.required' => __('global.Please upload an image with required dimensions'),
        ];
    }
}
