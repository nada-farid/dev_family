<?php

namespace App\Http\Requests;

use App\Models\ReportCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateReportCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('report_category_edit');
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
