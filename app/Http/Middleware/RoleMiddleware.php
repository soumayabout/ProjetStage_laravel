<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next,  ...$roles)
    {
        return $next($request);

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        foreach ($roles as $role) {
            if (Auth::user()->role == $role) {
                return $next($request);
            }
        }

        abort(403, 'Unauthorized action.');
    }
}
