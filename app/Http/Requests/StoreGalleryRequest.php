<?php

namespace App\Http\Requests;

use App\Models\Gallery;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGalleryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('gallery_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'image' => [
                'required'
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
