<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Menangani permintaan yang masuk.
     *
     * Middleware ini memeriksa apakah pengguna sudah login dan memiliki hak akses admin.
     * Jika tidak memenuhi syarat, akan mengembalikan respon 403 (Forbidden).
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Memeriksa status login dan hak akses admin
        if (!Auth::check() || !$request->user()->is_admin) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        } return $next($request);
    }
}
