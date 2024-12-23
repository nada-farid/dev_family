<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMemberRequest;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Models\Member;
use App\Models\MembershipType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MembersController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('member_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Member::with(['type'])->select(sprintf('%s.*', (new Member)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'member_show';
                $editGate      = 'member_edit';
                $deleteGate    = 'member_delete';
                $crudRoutePart = 'members';

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
            $table->editColumn('job', function ($row) {
                return $row->job ? $row->job : '';
            });
            $table->editColumn('employer', function ($row) {
                return $row->employer ? $row->employer : '';
            });
            $table->editColumn('phone_number', function ($row) {
                return $row->phone_number ? $row->phone_number : '';
            });
            $table->editColumn('identity_number', function ($row) {
                return $row->identity_number ? $row->identity_number : '';
            });
            $table->addColumn('type_title', function ($row) {
                return $row->type ? $row->type->title : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'type']);

            return $table->make(true);
        }

        return view('admin.members.index');
    }

    public function create()
    {
        abort_if(Gate::denies('member_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $types = MembershipType::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.members.create', compact('types'));
    }

    public function store(StoreMemberRequest $request)
    {
        $member = Member::create($request->all());

        return redirect()->route('admin.members.index');
    }

    public function edit(Member $member)
    {
        abort_if(Gate::denies('member_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $types = MembershipType::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $member->load('type');

        return view('admin.members.edit', compact('member', 'types'));
    }

    public function update(UpdateMemberRequest $request, Member $member)
    {
        $member->update($request->all());

        return redirect()->route('admin.members.index');
    }

    public function show(Member $member)
    {
        abort_if(Gate::denies('member_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $member->load('type');

        return view('admin.members.show', compact('member'));
    }

    public function destroy(Member $member)
    {
        abort_if(Gate::denies('member_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $member->delete();

        return back();
    }

    public function massDestroy(MassDestroyMemberRequest $request)
    {
        $members = Member::find(request('ids'));

        foreach ($members as $member) {
            $member->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
