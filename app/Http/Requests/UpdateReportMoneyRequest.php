<?php

namespace App\Http\Requests;

use App\Models\ReportMoney;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateReportMoneyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('report_money_edit');
    }

    public function rules()
    {
        return [
            'part' => [
                'required',
            ],
            'year' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'link' => [
                'string',
                'nullable',
            ],
            'file' => [
                'required',
            ],
        ];
    }
}
