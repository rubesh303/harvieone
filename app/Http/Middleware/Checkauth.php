<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Checkauth
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
        if(Auth::user()->hasRole('employee'))
    {
    return response()->json('You are an employee cannot access admin page');
    }
    // if(Auth::user()->hasRole('Admin'))
    // {
    // return response()->json('You are an admin can access admin page');
    // }
        return $next($request);
    }
}
