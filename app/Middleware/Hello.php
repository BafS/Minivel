<?php

namespace App\Middleware;

use Closure;
use Illuminate\Http\Request;

class Hello
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        echo 'Hello from Middleware';

        return $next($request);
    }
}