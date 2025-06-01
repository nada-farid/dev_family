<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyVolunteerRequest;
use App\Http\Requests\StoreVolunteerRequest;
use App\Http\Requests\UpdateVolunteerRequest;
use App\Models\Volunteer;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class VolunteerController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('volunteer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Volunteer::query()->select(sprintf('%s.*', (new Volunteer)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'volunteer_show';
                $editGate      = 'volunteer_edit';
                $deleteGate    = 'volunteer_delete';
                $crudRoutePart = 'volunteers'; 

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
            $table->editColumn('phone_number', function ($row) {
                return $row->phone_number ? $row->phone_number : '';
            });
            $table->editColumn('initiative_name', function ($row) {
                return $row->initiative_name ? $row->initiative_name : '';
            });
            $table->editColumn('created_at', function ($row) {
                return $row->created_at ? $row->created_at : '';
            });
            $table->editColumn('approved', function ($row) {
                if(!$row->approved){
                    $verify = '<a class="btn btn-xs btn-warning" href="'. route('admin.volunteers.verify', $row->id) .'">
                                    '. trans('global.verify') .'
                                </a> &nbsp; ';
                }else{
                    $verify = '  <i class="fas fa-check-circle" style="color:green;font-size:20px"> </i> ';
                }
                return $verify;
            });
            $table->editColumn('cv', function ($row) {
                return $row->cv ? '<a href="' . $row->cv->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'cv','approved']);

            return $table->make(true);
        }

        return view('admin.volunteers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('volunteer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.volunteers.create');
    }

    public function store(StoreVolunteerRequest $request)
    {
        $volunteer = Volunteer::create($request->all());

        if ($request->input('cv', false)) {
            $volunteer->addMedia(storage_path('tmp/uploads/' . basename($request->input('cv'))))->toMediaCollection('cv');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $volunteer->id]);
        }


        if ($request->input('photo', false)) {
            $volunteer->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $volunteer->id]);
        }

        return redirect()->route('admin.volunteers.index');
    }

    public function edit(Volunteer $volunteer)
    {
        abort_if(Gate::denies('volunteer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.volunteers.edit', compact('volunteer'));
    }

    public function verify($id)
    {
        $volunteer = Volunteer::findOrFail($id);

        return view('admin.volunteers.verify', compact('volunteer'));
    }

    public function update(UpdateVolunteerRequest $request, Volunteer $volunteer)
    {
        $volunteer->update($request->all());

        if ($request->input('cv', false)) {
            if (! $volunteer->cv || $request->input('cv') !== $volunteer->cv->file_name) {
                if ($volunteer->cv) {
                    $volunteer->cv->delete();
                }
                $volunteer->addMedia(storage_path('tmp/uploads/' . basename($request->input('cv'))))->toMediaCollection('cv');
            }
        } elseif ($volunteer->cv) {
            $volunteer->cv->delete();
        }


        if ($request->input('photo', false)) {
            if (! $volunteer->photo || $request->input('photo') !== $volunteer->photo->file_name) {
                if ($volunteer->photo) {
                    $volunteer->photo->delete();
                }
                $volunteer->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($volunteer->photo) {
            $volunteer->photo->delete();
        }
        
        return redirect()->route('admin.volunteers.index');
    }
    public function verify_submit(Request $request)
    {
        $volunteer = Volunteer::findOrfail($request->id);  
        $volunteer->approved = 1;
        $volunteer->password = bcrypt($request->password);
        $volunteer->save();

        return redirect()->route('admin.volunteers.index');
    }

    public function show(Volunteer $volunteer)
    {
        abort_if(Gate::denies('volunteer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.volunteers.show', compact('volunteer'));
    }

    public function destroy(Volunteer $volunteer)
    {
        abort_if(Gate::denies('volunteer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $volunteer->delete();

        return back();
    }

    public function massDestroy(MassDestroyVolunteerRequest $request)
    {
        $volunteers = Volunteer::find(request('ids'));

        foreach ($volunteers as $volunteer) {
            $volunteer->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('volunteer_create') && Gate::denies('volunteer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Volunteer();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
