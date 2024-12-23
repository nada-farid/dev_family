<?php

namespace App\Http\Requests;

use App\Models\HawkamCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyHawkamCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('hawkam_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:hawkam_categories,id',
        ];
    }
}
