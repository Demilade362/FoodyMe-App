<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileDeleteRequest;
use App\Http\Requests\ProfileUpdatePasswordRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        Gate::authorize('can-update-profile', $request->user());
        return view('auth.profile', compact('user'));
    }


    /**
     * Update the specified user info resource in storage.
     */
    public function updateInfo(ProfileUpdateRequest $request, User $user)
    {
        Gate::authorize('can-update-profile', $request->user());
        $user->update($request->validated());
        return Redirect::route("profile.index")->with('info_alert', 'Basic Profile Info Updated Successfully');
    }

    /**
     * Update the specified user password resource in storage.
     */
    public function updatePass(ProfileUpdatePasswordRequest $request, User $user)
    {
        Gate::authorize('can-update-profile', $request->user());
        $user->update($request->validated());
        return Redirect::route('profile.index')->with('password_alert', 'Password Updated Successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfileDeleteRequest $request, User $user)
    {
        Gate::authorize('can-update-profile', $request->user());
        $request->validated();

        auth()->logout();

        $user->delete();

        return Redirect::to("/");
    }
}
