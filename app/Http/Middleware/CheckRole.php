<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!session('nmuser')) {
            return redirect('login')->with('alert', 'Silakan login terlebih dahulu');
        }

        if (session('role') !== $role) {
            abort(403, 'Akses ditolak. Anda tidak memiliki permission untuk halaman ini.');
        }

        return $next($request);
    }
}
