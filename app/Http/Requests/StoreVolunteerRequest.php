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
            'email' => [
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'identity' => [
                'string',
                'required',
            ],
            'skills' => [
                'required',
            ],
            'experience' => [
                'required',
            ],
            'initiative_name' => [
                'string',
                'required',
            ],
            'cv' => [
                'required',
            ],
        ];
    }
}
