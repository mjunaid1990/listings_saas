<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckListingLimit
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->user()) {
            return redirect()->route('login');
        }

        $plan = $request->user()->currentPlan();
        $currentListings = $request->user()->properties()->count();

        if ($currentListings >= $plan->max_listings) {
            return redirect()->route('properties.index')
                ->with('error', 'You have reached your listing limit. Please upgrade your plan to add more listings.');
        }

        return $next($request);
    }
}
