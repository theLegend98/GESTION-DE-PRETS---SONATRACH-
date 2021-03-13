<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class NormalAgent
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
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->type == "NORMAL") {
            return $next($request);
        }

        if (Auth::user()->type =="ADMINISTRATEUR") {
            return redirect()->route('ADMINISTRATEUR');
        }

        if (Auth::user()->type =="SYSADM") {
            return redirect()->route('SYSADM');
        }

        if (Auth::user()->type == "CHEFUNITE") {
            return redirect()->route('CHEFUNITE');
        }
        if (Auth::user()->type =="COMMISSION"){
            return redirect()->route('COMMISSION');
         }
    }
}
