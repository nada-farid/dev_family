<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReportCategoryRequest;
use App\Http\Requests\StoreReportCategoryRequest;
use App\Http\Requests\UpdateReportCategoryRequest;
use App\Models\ReportCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ReportCategoriesController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('report_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ReportCategory::query()->select(sprintf('%s.*', (new ReportCategory)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'report_category_show';
                $editGate      = 'report_category_edit';
                $deleteGate    = 'report_category_delete';
                $crudRoutePart = 'report-categories';

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
            $table->editColumn('type', function ($row) {
                return $row->type ? ReportCategory::TYPE_SELECT[$row->type] : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('published', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->published ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder', 'published']);

            return $table->make(true);
        }

        return view('admin.reportCategories.index');
    }

    public function create()
    {
        abort_if(Gate::denies('report_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.reportCategories.create');
    }

    public function store(StoreReportCategoryRequest $request)
    {
        $reportCategory = ReportCategory::create($request->all());

        return redirect()->route('admin.report-categories.index');
    }

    public function edit(ReportCategory $reportCategory)
    {
        abort_if(Gate::denies('report_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.reportCategories.edit', compact('reportCategory'));
    }

    public function update(UpdateReportCategoryRequest $request, ReportCategory $reportCategory)
    {
        $reportCategory->update($request->all());

        return redirect()->route('admin.report-categories.index');
    }

    public function show(ReportCategory $reportCategory)
    {
        abort_if(Gate::denies('report_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.reportCategories.show', compact('reportCategory'));
    }

    public function destroy(ReportCategory $reportCategory)
    {
        abort_if(Gate::denies('report_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyReportCategoryRequest $request)
    {
        $reportCategories = ReportCategory::find(request('ids'));

        foreach ($reportCategories as $reportCategory) {
            $reportCategory->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
