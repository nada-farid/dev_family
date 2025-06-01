<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateProfileVolunteerRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ChangePasswordController extends Controller
{
    public function edit()
    { 

        return view('volunteer.auth.passwords.edit');
    }

    public function update(UpdatePasswordRequest $request)
    {
        auth('volunteer')->user()->update($request->validated());

        return redirect()->route('volunteer.profile.password.edit')->with('message', __('global.change_password_success'));
    }

    public function updateProfile(UpdateProfileVolunteerRequest $request)
    {
        $user = auth('volunteer')->user();

        $user->update($request->validated());

        if ($request->input('photo', false)) {
            if (! $user->photo || $request->input('photo') !== $user->photo->file_name) {
                if ($user->photo) {
                    $user->photo->delete();
                }
                $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($user->photo) {
            $user->photo->delete();
        }

        return redirect()->route('volunteer.profile.password.edit')->with('message', __('global.update_profile_success'));
    } 
}
