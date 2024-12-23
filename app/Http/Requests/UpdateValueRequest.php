<?php

namespace App\Http\Requests;

use App\Models\Value;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateValueRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('value_edit');
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
}
