<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{

    public function handle(Request $request, Closure $next,...$roles)
    {
    if (Auth::check()) {
    $user = Auth::user();
    foreach ($roles as $role) {
    if ($user->hasRole($role)) {
    return $next($request);
    }
    }
    }
    abort(403, 'No tienes permiso para acceder a esta página.');
    }
}