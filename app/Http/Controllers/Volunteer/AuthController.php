<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login_form(){
        return view('volunteer.auth.login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (!auth('volunteer')->attempt($credentials)) {
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
        
        return redirect()->route('volunteer.home'); 
    }
}
