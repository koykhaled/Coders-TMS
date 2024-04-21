<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    use UploadImageTrait;
    /**
     * Display the user's profile form.
     */
    public function show(Request $request)
    {
        $user = auth()->user();

        return view('profile.profile', compact('user'));
    }

    public function edit(Request $request)
    {
        $user = auth()->user();
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
    {
        try {
            //code...
            $user = auth()->user();
            $user->update([
                'name' => $request->name ?? $user->name,
                'description' => $request->description ?? $user->description,
                'photo' => $request->photo ?? $user->photo,
            ]);

            $this->uploadImage($request, "photo", $user, "profile/");
            $user->save();


            // notify()->preset('user-updated');

            return to_route('profile.show');
        } catch (\Throwable $th) {
            // notify()->error($th->getMessage());
            return to_route('profile.show');
        }

    }

    /**
     * Delete the user's account.
     */
    public function delete(Request $request)
    {
        $user = auth()->user();
        return view('profile.delete', compact('user'));
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = auth()->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // notify()->success("Your Account Deleted Successfully");

        return Redirect::to('/');
    }
}