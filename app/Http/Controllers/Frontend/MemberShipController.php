<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMemberRequest;
use App\Models\Member;
use App\Models\MembershipType;
use Illuminate\Http\Request;
use Alert;

class MemberShipController extends Controller
{
    //
    public function membership()
    {
        $types = MembershipType::all();
        return view('frontend.membership', compact('types'));
    }


    public function store(StoreMemberRequest $request)
    {
        $member = Member::create($request->all());

        Alert::success(trans('تم بنجاح'),trans('تم حفظ البيانات بنجاح'));

        return redirect()->route('frontend.membership',$request->type);
    }
}
