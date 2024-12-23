<?php

namespace App\Http\Requests;

use App\Models\BeneficiaryJourney;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBeneficiaryJourneyRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('beneficiary_journey_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:beneficiary_journeys,id',
        ];
    }
}
