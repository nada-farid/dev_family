<?php

namespace App\Http\Requests;

use App\Models\SaidAboutUs;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySaidAboutUsRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('said_about_us_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:said_about_uss,id',
        ];
    }
}
