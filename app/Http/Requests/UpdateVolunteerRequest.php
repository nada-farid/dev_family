<?php

namespace App\Http\Requests;

use App\Models\Volunteer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVolunteerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('volunteer_edit');
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
                'unique:volunteers,email,' . request()->route('volunteer')->id,
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
        ];
    }
}
