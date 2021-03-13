<?php

namespace App\Http\Middleware;

use Closure;

class TypeUser
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
        if(auth()->user()->type == "NORMAL"){
            return $next($request);
        }
        if(auth()->user()->type == "ADMINISTRATEUR"){
            return $next($request);
        }
        if(auth()->user()->type == "CHEFUNITE"){
            return $next($request);
        }

        return redirect('home')->with('error',"ghfgh");
    }
}
