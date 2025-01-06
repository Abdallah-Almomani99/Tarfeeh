<?php

namespace App\Http\Controllers\UserController;

use App\Models\Booking;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UserAuthentication;
use App\Http\Requests\ProfileUpdateRequest;

class UserProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();

        $bookings = Booking::where('user_id', $user->id)->get();
        return view('user.profile', compact('user', 'bookings'));
    }


    /**
     * Update the user's profile information.
     */
    public function update(UserAuthentication $request)
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
        return Redirect::route('user.profile.edit')->with('status', 'profile-updated')->with('success', 'Your profile has been updated successfully!');
    }

    /**
     * Show password update form.
     */
    public function passEdit(Request $request): View
    {
        return view('user.password-form', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request)
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
