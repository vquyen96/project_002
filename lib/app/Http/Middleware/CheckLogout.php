<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckLogout
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
        if (Auth::guest()) {
            return $next($request);
        }
        else{
            switch (Auth::user()->level) {
                case 1:
                    return redirect('admin');
                    break;
                case 2:
                    return redirect('admin');
                    break;
                case 3:
                    return redirect('');
                    break;
                
                default:
                    Auth::logout();
                    return redirect('login');
                    break;
            }
            
            
        }
    }
}
