<?php

namespace App\Http\Requests;

use App\Models\Stakeholder;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStakeholderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('stakeholder_create');
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
