<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasActiveSubscription
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->user() || !$request->user()->hasActiveSubscription()) {
            return redirect()->route('plans.index')->with('error', 'You need an active subscription to access this feature');
        }

        return $next($request);
    }
}
