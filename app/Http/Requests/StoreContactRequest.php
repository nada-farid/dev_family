<?php

namespace App\Http\Requests;

use App\Models\Contact;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'type' => [
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'string',
                'required',
                'email'
            ],
            'phone_number' => [
                'required',
                'regex:/^05\d{8}$/',
            ],
            'message' => [
                'string',
                'required',
            ],
        ];
    }

    public function messages()
    {
        return [
            'phone_number.regex' => 'رقم الجوال يجب ان يكون 10 أرقام ويبدأ ب 05',
        ];
    }
}
