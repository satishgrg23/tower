<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Rule 1: User must be authenticated
        // Rule 2: Authenticated user must be admin
        if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'admin'){
                return $next($request);
        }else{
            return redirect("/login");
        }

    }
}
