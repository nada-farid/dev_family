<?php

namespace App\Http\Requests;

use App\Models\Member;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMemberRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('member_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'job' => [
                'string',
                'nullable',
            ],
            'employer' => [
                'string',
                'nullable',
            ],
            'phone_number' => [
                'string',
                'required',
            ],
            'email' => [
                'string',
                'required',
            ],
            'identity_number' => [
                'string',
                'max:10',
                'required',
            ],
            'identity_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'type_id' => [
                'required',
                'integer',
            ],
            'date_of_birth' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'residence' => [
                'string',
                'nullable',
            ],
            'neighborhood' => [
                'string',
                'nullable',
            ],
        ];
    }
}
