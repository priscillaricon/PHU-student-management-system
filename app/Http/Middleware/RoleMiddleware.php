<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Check if user is logged in
        if (! Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        // Check if user's role is in the allowed roles
        if (! in_array(Auth::user()->role, $roles)) {
            abort(403, 'Unauthorized. You do not have permission to access this page.');
        }

        return $next($request);
    }
}
