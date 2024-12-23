<?php

namespace App\Http\Requests;

use App\Models\Stakeholder;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyStakeholderRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('stakeholder_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:stakeholders,id',
        ];
    }
}
