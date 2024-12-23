<?php

namespace App\Http\Requests;

use App\Models\Hawkma;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHawkmaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('hawkma_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'file' => [
                'required',
            ],
            'category_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
