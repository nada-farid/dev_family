<?php

namespace App\Http\Requests;

use App\Models\SwotAnalysi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSwotAnalysiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('swot_analysi_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
        ];
    }
}
