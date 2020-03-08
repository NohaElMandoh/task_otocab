<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        
    


        if ($guard == "admin" && Auth::guard($guard)->check()) {
            if($guard == 'admin'){//check for guard admin
               
               return redirect(route('/admin'));
            }
            return redirect('/login');// guard auth
        }

     
        return $next($request);
    }
}
