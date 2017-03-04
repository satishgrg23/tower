<?php

namespace App\Http\Middleware;

use Closure;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class VisitorsMiddleware
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
        if ( !Sentinel::check()) {
            return $next($request);
        }
        else{
            if (Sentinel::getUser()->roles()->first()->slug == 'admin'){
                return redirect('admin/dashboard');
            }elseif(Sentinel::getUser()->roles()->first()->slug == 'user'){
                return redirect('user/dashboard');
            }
        }
    }
}
