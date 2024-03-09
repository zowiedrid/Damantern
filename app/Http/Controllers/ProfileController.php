<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // $request->user()->fill($request->validated());

        // if ($request->user()->isDirty('email')) {
        //     $request->user()->email_verified_at = null;
        // }

        // $request->user()->save();

        // return Redirect::route('profile.edit')->with('status', 'profile-updated');


        $request->user()->fill($request->validated());

        $user = Auth::user();

        $user->name = $request->input('name');
        $user->tanggallahir = $request->input('tanggallahir');
        $user->jeniskelamin = $request->input('jeniskelamin');
        $user->alamat = $request->input('alamat');
        $user->nohp = $request->input('nohp');
        $user->asalinstansi = $request->input('asalinstansi');
        $user->jurusan = $request->input('jurusan');
        $user->semesterkelas = $request->input('semesterkelas');
        $user->mulaimagang = $request->input('mulaimagang');
        $user->selesaimagang = $request->input('selesaimagang');

        // Update any other necessary fields
    
        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');

    
        // return redirect()->back()->with('success', 'Profile updated successfully.');
    
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
