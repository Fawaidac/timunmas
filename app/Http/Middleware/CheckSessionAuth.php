<?php

namespace App\Http\Middleware;

use App\Models\Pengguna;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSessionAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session('nmuser')) {
            return redirect('login')->with('alert', 'Silakan login terlebih dahulu');
        }

        if (!session('role')) {
            $user = Pengguna::where('nm_user', session('nmuser'))->first();
            session(['role' => $user?->role ?? 'sales']);
        }
        
        return $next($request);
    }
}
