<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySwotAnalysiRequest;
use App\Http\Requests\StoreSwotAnalysiRequest;
use App\Http\Requests\UpdateSwotAnalysiRequest;
use App\Models\SwotAnalysi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SwotAnalysisController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('swot_analysi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $swotAnalysis = SwotAnalysi::all();

        return view('admin.swotAnalysis.index', compact('swotAnalysis'));
    }

    public function create()
    {
        abort_if(Gate::denies('swot_analysi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.swotAnalysis.create');
    }

    public function store(StoreSwotAnalysiRequest $request)
    {
        $swotAnalysi = SwotAnalysi::create($request->all());

        return redirect()->route('admin.swot-analysis.index');
    }

    public function edit(SwotAnalysi $swotAnalysi)
    {
        abort_if(Gate::denies('swot_analysi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.swotAnalysis.edit', compact('swotAnalysi'));
    }

    public function update(UpdateSwotAnalysiRequest $request, SwotAnalysi $swotAnalysi)
    {
        $swotAnalysi->update($request->all());

        return redirect()->route('admin.swot-analysis.index');
    }

    public function show(SwotAnalysi $swotAnalysi)
    {
        abort_if(Gate::denies('swot_analysi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.swotAnalysis.show', compact('swotAnalysi'));
    }

    public function destroy(SwotAnalysi $swotAnalysi)
    {
        abort_if(Gate::denies('swot_analysi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $swotAnalysi->delete();

        return back();
    }

    public function massDestroy(MassDestroySwotAnalysiRequest $request)
    {
        $swotAnalysis = SwotAnalysi::find(request('ids'));

        foreach ($swotAnalysis as $swotAnalysi) {
            $swotAnalysi->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
