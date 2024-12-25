<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->user_type === 'admin') {
            return $next($request);
        }

        if (Auth::check() && Auth::user()->user_type === 'user') {
            return redirect('/home');
        }

        return redirect('/')->with('error', 'Access denied!');
    }
}
