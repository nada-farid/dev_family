<?php

namespace App\Http\Requests;

use App\Models\VolunteerTask;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyVolunteerTaskRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('volunteer_task_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:volunteer_tasks,id',
        ];
    }
}
