<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ChecKRoleMiddlware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * 
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if ($request->user() && $request->user()->role->name === $role) {
            return $next($request);
        }

        return redirect('/');
    }
}
