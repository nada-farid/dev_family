<?php

namespace App\Http\Requests;

use App\Models\BeneficiaryJourney;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBeneficiaryJourneyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('beneficiary_journey_create');
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

    
    public function messages()
    {
        return [
            'icon.required' => __('global.Please upload an image with required dimensions'),
        ];
    }
}
