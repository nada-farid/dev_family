<?php

namespace App\Http\Requests;

use App\Models\ReportCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreReportCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('report_category_create');
    }

    public function rules()
    {
        return [
            'type' => [
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
