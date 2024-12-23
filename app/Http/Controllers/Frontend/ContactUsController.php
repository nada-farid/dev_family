<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Alert;

class ContactUsController extends Controller
{
    //

    public function contact(){
        
        return view('frontend.contact');
    }

    public function store(StoreContactRequest $request)
    {
        $contact = Contact::create($request->all());

        Alert::success(trans('تم بنجاح'),trans('تم حفظ البيانات بنجاح'));

        return redirect()->back();
    }

    
    public function subscribe(Request $request)
    {
        $subscribe = Subscribe::create($request->all());
         
        Alert::success(trans('flash.store.title'),trans('flash.store.body'));

        return redirect()->route("frontend.home");
    }
}
