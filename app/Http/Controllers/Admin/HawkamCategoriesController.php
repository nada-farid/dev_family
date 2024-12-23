<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHawkamCategoryRequest;
use App\Http\Requests\StoreHawkamCategoryRequest;
use App\Http\Requests\UpdateHawkamCategoryRequest;
use App\Models\HawkamCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class HawkamCategoriesController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('hawkam_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = HawkamCategory::query()->select(sprintf('%s.*', (new HawkamCategory)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'hawkam_category_show';
                $editGate      = 'hawkam_category_edit';
                $deleteGate    = 'hawkam_category_delete';
                $crudRoutePart = 'hawkam-categories';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.hawkamCategories.index');
    }

    public function create()
    {
        abort_if(Gate::denies('hawkam_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hawkamCategories.create');
    }

    public function store(StoreHawkamCategoryRequest $request)
    {
        $hawkamCategory = HawkamCategory::create($request->all());

        return redirect()->route('admin.hawkam-categories.index');
    }

    public function edit(HawkamCategory $hawkamCategory)
    {
        abort_if(Gate::denies('hawkam_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hawkamCategories.edit', compact('hawkamCategory'));
    }

    public function update(UpdateHawkamCategoryRequest $request, HawkamCategory $hawkamCategory)
    {
        $hawkamCategory->update($request->all());

        return redirect()->route('admin.hawkam-categories.index');
    }

    public function show(HawkamCategory $hawkamCategory)
    {
        abort_if(Gate::denies('hawkam_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hawkamCategories.show', compact('hawkamCategory'));
    }

    public function destroy(HawkamCategory $hawkamCategory)
    {
        abort_if(Gate::denies('hawkam_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hawkamCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyHawkamCategoryRequest $request)
    {
        $hawkamCategories = HawkamCategory::find(request('ids'));

        foreach ($hawkamCategories as $hawkamCategory) {
            $hawkamCategory->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
