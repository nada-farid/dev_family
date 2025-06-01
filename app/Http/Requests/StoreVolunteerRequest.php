<?php

namespace App\Http\Requests;

use App\Models\Volunteer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVolunteerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'identity_num' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'unique:volunteers'
            ],
            'phone_number' => [
                'string',
                'required',
            ],
            'interest' => [
                'string',
                'nullable',
            ],
            'initiative_name' => [
                'string',
                'nullable',
            ],
            'prev_experience' => [
                'string',
                'nullable',
            ],
            'cv' => [ 
                'nullable',
            ],
        ];
    }
}
