<?php

namespace App\Http\Requests;

use App\Models\VolunteerGuide;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVolunteerGuideRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('volunteer_guide_create');
    }

    public function rules()
    {
        return [
            'file' => [
                'required',
            ],
            'title' => [
                'string',
                'required',
            ],
        ];
    }
}
