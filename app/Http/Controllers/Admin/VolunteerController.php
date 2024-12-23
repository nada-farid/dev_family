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
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('identity', function ($row) {
                return $row->identity ? $row->identity : '';
            });
            $table->editColumn('skills', function ($row) {
                return $row->skills ? $row->skills : '';
            });
            $table->editColumn('experience', function ($row) {
                return $row->experience ? $row->experience : '';
            });
            $table->editColumn('volunteer_befor', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->volunteer_befor ? 'checked' : null) . '>';
            });
            $table->editColumn('initiative_name', function ($row) {
                return $row->initiative_name ? $row->initiative_name : '';
            });
            $table->editColumn('cv', function ($row) {
                return $row->cv ? '<a href="' . $row->cv->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'volunteer_befor', 'cv']);

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

        return redirect()->route('admin.volunteers.index');
    }

    public function edit(Volunteer $volunteer)
    {
        abort_if(Gate::denies('volunteer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.volunteers.edit', compact('volunteer'));
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
