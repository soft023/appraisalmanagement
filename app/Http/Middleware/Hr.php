<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class Hr
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
       
        $role  = Auth()->user()->righthr;

        if($role == 1){

             return $next($request);
        }

        return redirect('/logout');
    }
}
