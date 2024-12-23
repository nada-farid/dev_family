<?php

namespace App\Http\Requests;

use App\Models\SwotAnalysi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSwotAnalysiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('swot_analysi_create');
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
