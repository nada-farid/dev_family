<?php

namespace App\Http\Requests;

use App\Models\VolunteerTask;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVolunteerTaskRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('volunteer_task_edit');
    }

    public function rules()
    {
        return [
            'volunteer_id' => [
                'required',
                'integer',
            ],
            'name' => [
                'string',
                'required',
            ],
            'address' => [
                'string',
                'required',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'visit_type' => [
                'required',
            ],
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
