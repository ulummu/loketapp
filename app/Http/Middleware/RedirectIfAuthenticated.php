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
        // if (Auth::guard($guard)->check()) {
        //     return redirect('/admin/home');
        // }

        // return $next($request);
        if (Auth::guard($guard)->check()) {
            if (Auth::user()->hasRole('administrator')) {
                return redirect('/admin/home');
            }
            // else if (Auth::user()->hasRole('staf_loket')) {
            //     return redirect('/loket/dashboard');
            // }
            else {
                return redirect('/loket/dashboard');
            }
            // return view('home');
        }
        return $next($request);
    }
}
