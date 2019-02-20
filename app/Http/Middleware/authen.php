<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class authen
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
        if(Auth::check())
        {
            if(Auth::user()->role=='admin' || Auth::user()->role=='user' )
            {
                return $next($request);
            }
            else
            {
                // return redirect()->intended('/userhome')->with('info','You do not have rights to access this location.'); ?
            }

        }

        return redirect()->intended('/login')->with('info','Please login first to access Admin Portal.');
    }
}
