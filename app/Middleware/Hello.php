<?php

namespace App\Middleware;

use Closure;
use Illuminate\Http\Request;

class Hello
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): mixed
    {
        echo 'Hello from Middleware';

        return $next($request);
    }
}