<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!$request->user() || !$request->user()->hasRole($roles[0])) {
            abort(403, 'You do not have permission to access this resource.');
        }

        return $next($request);
    }
}
