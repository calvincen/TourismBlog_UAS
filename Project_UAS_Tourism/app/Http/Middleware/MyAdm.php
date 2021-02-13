<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class MyAdm
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
        if(Auth::check() && Auth::user()->role == "admin"){
            return $next($request);
        }
        else if(Auth::check() && Auth::user()->role == "user"){
            return redirect('/home/users');
        }
        else{
            return redirect('/');
        }
    }
}
