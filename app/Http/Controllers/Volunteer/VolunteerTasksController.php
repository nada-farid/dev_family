<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyVolunteerTaskRequest;
use App\Http\Requests\StoreVolunteerTaskRequest;
use App\Http\Requests\UpdateVolunteerTaskRequest;
use App\Models\Volunteer;
use App\Models\VolunteerTask;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class VolunteerTasksController extends Controller
{
    use MediaUploadingTrait;

    public function qr($id)
    {  
        $volunteerTask = VolunteerTask::findOrFail($id);
        $volunteerTask->load('volunteer');

        return view('volunteer.volunteerTasks.qr', compact('volunteerTask'));
    }
    public function finish(Request $request)
    {  
        $volunteerTask = VolunteerTask::findOrFail($request->id);
        $volunteerTask->notes = $request->notes;
        $volunteerTask->status = 'done';
        $volunteerTask->leave_time = date('H:i:s');
        $volunteerTask->save();

        foreach ($request->input('files', []) as $file) {
            $volunteerTask->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('files');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $volunteerTask->id]);
        }

        return redirect()->route('volunteer.volunteer-tasks.index');
    }

    public function status(Request $request){ 
        $volunteerTask = VolunteerTask::findOrFail($request->id);
        if($request->status == 'start'){
            $volunteerTask->status = 'working';
            $volunteerTask->arrive_time = date('H:i:s');
            $volunteerTask->save();

        }elseif($request->status == 'end'){

            $volunteerTask->status = 'done';
            $volunteerTask->leave_time = date('H:i:s');
            $volunteerTask->save();
        }else{
            abort(404);
        }

        
        return redirect()->route('volunteer.volunteer-tasks.index');
    }

    public function index(Request $request)
    { 

        if ($request->ajax()) {
            $query = VolunteerTask::where('volunteer_id',auth('volunteer')->user()->id)->select(sprintf('%s.*', (new VolunteerTask)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = false;
                $editGate      =   false;
                $deleteGate    =   false;
                $crudRoutePart = 'volunteer-tasks';

                $view = '<a class="btn btn-xs btn-info" href="'. route('volunteer.' . $crudRoutePart . '.show', $row->id) .'">
                            '. trans('global.view') . '
                        </a> &nbsp;'; 
                $qr = '<a class="btn btn-xs btn-success" href="'. route('volunteer.' . $crudRoutePart . '.qr', $row->id) .'">
                            الهوية الرقمية
                        </a> &nbsp;'; 
                
                if($row->status == 'pending'){

                    $status = '<a class="btn btn-xs btn-info" href="'. route('volunteer.' . $crudRoutePart . '.status', ['id' => $row->id , 'status' => 'start']) .'">
                    بدء العمل
                    </a> &nbsp;'; 
                }elseif($row->status == 'working'){
                    $status = '<a class="btn btn-xs btn-warning" href="#" onclick="edit_volunteer_task('.$row->id.')">
                    انهاء العمل
                    </a> &nbsp;'; 
                    
                }else{
                    $status = '';
                    $qr = '';
                }

                return $view . $status . $qr . view('partials.datatablesActions', compact(
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

        return view('volunteer.volunteerTasks.index');
    }  

    public function edit(VolunteerTask $volunteerTask)
    { 

        $volunteers = Volunteer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $volunteerTask->load('volunteer');

        return view('volunteer.volunteerTasks.edit', compact('volunteerTask', 'volunteers'));
    }

    public function update(Request $request, VolunteerTask $volunteerTask)
    {
        $volunteerTask->update($request->all());

        return redirect()->route('volunteer.volunteer-tasks.index');
    }

    public function show(VolunteerTask $volunteerTask)
    { 

        $volunteerTask->load('volunteer');

        return view('volunteer.volunteerTasks.show', compact('volunteerTask'));
    } 
    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('volunteer_task_create') && Gate::denies('volunteer_task_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new VolunteerTask();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
