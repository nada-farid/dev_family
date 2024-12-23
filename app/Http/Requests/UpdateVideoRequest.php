<?php

namespace App\Http\Requests;

use App\Models\Video;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVideoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('video_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'image' => [
                'required',
            ],
            'url' => [
                'string',
                'required',
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
