<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and has an admin role
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        Log::info('Triggered');

        // Redirect or deny access for unauthorized users
        return redirect()->route('login')->with('error', 'Unauthorized access.');
    }
}
