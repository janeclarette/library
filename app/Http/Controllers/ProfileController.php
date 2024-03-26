<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();
        $profileImage = $user->img_path ? Storage::url('images/' . $user->img_path) : null;
    
        return view('profile.edit', [
            'user' => $user,
            'profileImage' => $profileImage,
        ]);
    }
    


    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function updateImage(Request $request)
    {
        $request->validate([
            'img_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image file
        ]);

        $user = $request->user();

        // Delete old profile image if it exists
        if ($user->img_path) {
            Storage::delete('images/' . $user->img_path);
        }

        // Store the uploaded image with a unique name
        $imagePath = $request->file('img_path')->store('images', 'public');

        // Update the user's img_path in the database with the new image path
        $user->img_path = basename($imagePath);
        $user->save();

        return redirect()->route('profile.edit')->with('status', 'Profile image updated successfully.');
    }
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
