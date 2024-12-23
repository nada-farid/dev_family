<?php

namespace App\Http\Requests;

use App\Models\SwotAnalysi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySwotAnalysiRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('swot_analysi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:swot_analysis,id',
        ];
    }
}
