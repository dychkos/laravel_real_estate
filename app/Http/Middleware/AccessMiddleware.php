<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->user()->canEdit($request->id)){
            return $next($request);
        }
        return redirect()->route("user.houses");

    }
}
