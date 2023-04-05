<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Roles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $roles)
    {
        $roles = explode('|', $roles);
        foreach ($roles as $role) {
            if ($request->user()->role == $role) {
                return $next($request);
            }
        }
        return abort(404);
    }
}
