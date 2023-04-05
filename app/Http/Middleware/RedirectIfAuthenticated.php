<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // lower role
                $role = Auth::user()->role;
                if ($role == 'Admin') {
                    return redirect('/admin/dashboard');
                } elseif ($role == 'Guru') {
                    return redirect('/guru/dashboard');
                } elseif ($role == 'WaliSiswa') {
                    return redirect('/walisiswa/dashboard');
                } elseif ($role == 'SuperAdmin') {
                    return redirect('/superadmin/dashboard');
                }
            }
        }

        return $next($request);
    }
}
