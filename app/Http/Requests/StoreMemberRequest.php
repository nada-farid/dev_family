<?php

namespace App\Http\Requests;

use App\Models\Member;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMemberRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'type_id' => [
                'required',
            ],
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

    public function messages()
    {
        return [
            'phone_number.regex' => 'رقم الجوال يجب ان يكون 10 أرقام ويبدأ ب 05',
            'identity_number.max'=>'رقم الهوية يجب ان يكون 10 أرقام',
            'identity_number.integer'=>'رقم الهوية يجب ان يكون  أرقام',
            'identity_number.required'=>'رقم الهوية مطلوب ',
            'type_id.required'=>'نوع العضوية مطلوب',
        ];
    }
}
