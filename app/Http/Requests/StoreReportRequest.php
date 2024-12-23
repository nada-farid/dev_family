<?php

namespace App\Http\Requests;

use App\Models\Report;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreReportRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('report_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'link' => [
                'string',
                'nullable',
            ],
            'category_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
