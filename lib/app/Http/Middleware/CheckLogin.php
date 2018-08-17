<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckLogin
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
        if (Auth::check()) {
            if (Auth::user()->level == 2 || Auth::user()->level == 1) {
                return $next($request);
            }
            else{
                return redirect('login');
            }
        }
        else{
            return redirect('login');
        }
    }
}
