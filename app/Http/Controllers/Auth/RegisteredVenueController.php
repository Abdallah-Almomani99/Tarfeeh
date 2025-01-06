<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;

class RegisteredVenueController extends Controller
{
    /**
     * Display the registration view for the venue.
     */
    public function create()
    {
        return view('auth.register-venue');
    }

    /**
     * Handle the venue registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'user_name' => [
                'required',
                'string',
                'max:50',
                Rule::unique('users', 'user_name'),
            ],
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'gender' => ['required', Rule::in(['male', 'female'])],
            'birthday' => ['required', 'date', 'before:today', 'after:100 years ago'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users', 'email'),
            ],
            'phone' => ['required', 'regex:/^[0-9]{10}$/'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'point' => ['nullable', 'integer', 'min:0'],
            'image' => ['nullable', 'image', 'mimes:jpg,png,jpeg,gif,webp', 'max:2048'],
        ]);


        $user = User::create([
            'user_name' => $request->user_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'email' => $request->email,
            'phone' => $request->phone,
            'user_type' => 'venue',
            'status' => 'active',
            'password' => Hash::make($request->password),
            'point' => $request->point ?? 0,
            'image' => $request->image ? $request->image->store('users') : 'default.png', // صورة المستخدم
        ]);

        event(new Registered($user));

        Auth::login($user);


        return redirect()->route('venue.create')->with('success', 'Welcome To Our Team');
    }
}
