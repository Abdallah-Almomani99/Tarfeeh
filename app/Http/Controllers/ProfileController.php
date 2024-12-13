<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\UserAuthentication;

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
    public function update(UserAuthentication $request): RedirectResponse
    {
        $user = $request->user();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Validate image file type and size
            $request->validate([
                'image' => ['nullable', 'image', 'mimes:jpg,png,jpeg,gif,webp', 'max:2048'],
            ]);

            // Delete the old image if it exists and isn't the default image
            if ($user->image !== 'uploads/users/default.png' && Storage::exists('public/' . $user->image)) {
                Storage::delete('public/' . $user->image);
            }

            // Store new image in `public/storage/uploads/users`
            $path = $request->file('image')->store('uploads/users', 'public');
            $user->image = $path; // Update the image path
        }

        // Update other user details (like name, email, etc.)
        $user->fill($request->validated());


        // Save updated user details
        $user->save();

        // Redirect back with a success message
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function passEdit(Request $request): View
    {
        return view('profile.password-form', [
            'user' => $request->user(),  // Pass the authenticated user data to the view
        ]);
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

        return Redirect::to('/login');
    }
}
