<?php

namespace App\Http\Requests;

use App\Models\Stakeholder;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStakeholderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('stakeholder_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'description' => [
                'required',
            ],
        ];
    }
}
