<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class IsAdmin
{
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() &&  Auth::user()->roles == 'admin' || Auth::user()->roles == 'superuser') {
            return $next($request);
        }

        return redirect('login')->with('error','Vous avez pas les droits d\'admin');
        
    }
}
