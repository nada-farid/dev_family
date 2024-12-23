<?php

namespace App\Http\Requests;

use App\Models\ReportMoney;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyReportMoneyRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('report_money_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:report_moneys,id',
        ];
    }
}
