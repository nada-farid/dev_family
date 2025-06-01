<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVolunteerTaskRequest;
use App\Http\Requests\StoreVolunteerTaskRequest;
use App\Http\Requests\UpdateVolunteerTaskRequest;
use App\Models\Volunteer;
use App\Models\VolunteerTask;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class VolunteerTasksController extends Controller
{
    public function qr($id)
    {  
        $volunteerTask = VolunteerTask::findOrFail($id);
        $volunteerTask->load('volunteer');

        return view('admin.volunteerTasks.qr', compact('volunteerTask'));
    }

    public function index(Request $request)
    {
        abort_if(Gate::denies('volunteer_task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = VolunteerTask::with(['volunteer'])->select(sprintf('%s.*', (new VolunteerTask)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'volunteer_task_show';
                $editGate      = $row->status == 'pending' ? 'volunteer_task_edit' : false;
                $deleteGate    = $row->status == 'pending' ? 'volunteer_task_delete' : false;
                $crudRoutePart = 'volunteer-tasks';

                $qr = '<a class="btn btn-xs btn-success" href="'. route('admin.' . $crudRoutePart . '.qr', $row->id) .'">
                            الهوية الرقمية
                        </a> &nbsp;'; 

                return $qr . view('partials.datatablesActions', compact(
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
            $table->addColumn('volunteer_name', function ($row) {
                return $row->volunteer ? $row->volunteer->name : '';
            });

            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('visit_type', function ($row) {
                return $row->visit_type ? VolunteerTask::VISIT_TYPE_SELECT[$row->visit_type] : '';
            });

            $table->editColumn('status', function ($row) {
                return $row->status ? VolunteerTask::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'volunteer']);

            return $table->make(true);
        }

        return view('admin.volunteerTasks.index');
    }

    public function create()
    {
        abort_if(Gate::denies('volunteer_task_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $volunteers = Volunteer::where('approved',1)->get()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.volunteerTasks.create', compact('volunteers'));
    }

    public function store(StoreVolunteerTaskRequest $request)
    {
        $volunteerTask = VolunteerTask::create($request->all());

        return redirect()->route('admin.volunteer-tasks.index');
    }

    public function edit(VolunteerTask $volunteerTask)
    {
        abort_if(Gate::denies('volunteer_task_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $volunteers = Volunteer::where('approved',1)->get()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $volunteerTask->load('volunteer');

        return view('admin.volunteerTasks.edit', compact('volunteerTask', 'volunteers'));
    }

    public function update(UpdateVolunteerTaskRequest $request, VolunteerTask $volunteerTask)
    {
        $volunteerTask->update($request->all());

        return redirect()->route('admin.volunteer-tasks.index');
    }

    public function show(VolunteerTask $volunteerTask)
    {
        abort_if(Gate::denies('volunteer_task_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $volunteerTask->load('volunteer');

        return view('admin.volunteerTasks.show', compact('volunteerTask'));
    }

    public function destroy(VolunteerTask $volunteerTask)
    {
        abort_if(Gate::denies('volunteer_task_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $volunteerTask->delete();

        return back();
    } 
}
