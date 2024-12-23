<?php

namespace App\Http\Requests;

use App\Models\BeneficiaryJourney;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBeneficiaryJourneyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('beneficiary_journey_edit');
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
            'icon' => [
                'required',
            ],
        ];
    }
}
