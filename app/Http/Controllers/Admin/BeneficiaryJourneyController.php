<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBeneficiaryJourneyRequest;
use App\Http\Requests\StoreBeneficiaryJourneyRequest;
use App\Http\Requests\UpdateBeneficiaryJourneyRequest;
use App\Models\BeneficiaryJourney;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class BeneficiaryJourneyController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('beneficiary_journey_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiaryJourneys = BeneficiaryJourney::with(['media'])->get();

        return view('admin.beneficiaryJourneys.index', compact('beneficiaryJourneys'));
    }

    public function create()
    {
        abort_if(Gate::denies('beneficiary_journey_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.beneficiaryJourneys.create');
    }

    public function store(StoreBeneficiaryJourneyRequest $request)
    {
        $beneficiaryJourney = BeneficiaryJourney::create($request->all());

        if ($request->input('icon', false)) {
            $beneficiaryJourney->addMedia(storage_path('tmp/uploads/' . basename($request->input('icon'))))->toMediaCollection('icon');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $beneficiaryJourney->id]);
        }

        return redirect()->route('admin.beneficiary-journeys.index');
    }

    public function edit(BeneficiaryJourney $beneficiaryJourney)
    {
        abort_if(Gate::denies('beneficiary_journey_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.beneficiaryJourneys.edit', compact('beneficiaryJourney'));
    }

    public function update(UpdateBeneficiaryJourneyRequest $request, BeneficiaryJourney $beneficiaryJourney)
    {
        $beneficiaryJourney->update($request->all());

        if ($request->input('icon', false)) {
            if (! $beneficiaryJourney->icon || $request->input('icon') !== $beneficiaryJourney->icon->file_name) {
                if ($beneficiaryJourney->icon) {
                    $beneficiaryJourney->icon->delete();
                }
                $beneficiaryJourney->addMedia(storage_path('tmp/uploads/' . basename($request->input('icon'))))->toMediaCollection('icon');
            }
        } elseif ($beneficiaryJourney->icon) {
            $beneficiaryJourney->icon->delete();
        }

        return redirect()->route('admin.beneficiary-journeys.index');
    }

    public function show(BeneficiaryJourney $beneficiaryJourney)
    {
        abort_if(Gate::denies('beneficiary_journey_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.beneficiaryJourneys.show', compact('beneficiaryJourney'));
    }

    public function destroy(BeneficiaryJourney $beneficiaryJourney)
    {
        abort_if(Gate::denies('beneficiary_journey_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiaryJourney->delete();

        return back();
    }

    public function massDestroy(MassDestroyBeneficiaryJourneyRequest $request)
    {
        $beneficiaryJourneys = BeneficiaryJourney::find(request('ids'));

        foreach ($beneficiaryJourneys as $beneficiaryJourney) {
            $beneficiaryJourney->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('beneficiary_journey_create') && Gate::denies('beneficiary_journey_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new BeneficiaryJourney();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
