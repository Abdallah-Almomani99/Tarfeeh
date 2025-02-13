<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        // dd(redirect()->route('venue.profile.show', ['id' => Auth::user()->id]));
        // Check user type and redirect accordingly
        if (Auth::user()->user_type === 'admin') {
            return redirect()->intended('/admin/dashboard');
        }

        if (Auth::user()->user_type === 'venue') {
            // Redirect to venue profile page
            // dd(redirect()->route('venue.profile.show', ['id' => Auth::user()->id]));
            // return redirect()->route('venue.profile.show', ['id' => Auth::user()->id]);

            return redirect()->route('venue.details');
        }

        return redirect()->route('show.category');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/home');
    }
}
