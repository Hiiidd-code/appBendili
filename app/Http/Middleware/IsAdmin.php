<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Jika belum login → redirect ke login
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Jika bukan admin → abort 403
        if (Auth::user()->is_admin != 1) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}
