<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApplyLivewireLayout
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if ($response instanceof \Livewire\Response) {
            echo 'e';die();
            $response->layout('\App\Http\Livewire\Layouts\App');
        }

        return $response;
    }
}
