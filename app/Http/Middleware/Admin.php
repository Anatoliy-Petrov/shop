<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        //dd(auth()->user());
        if(auth()->user() and auth()->user()->isAdmin == 1){

            return $next($request);
        }
        return redirect(route('home'))->with('error', 'куда Вы лезете? прекратите немедленно!');
    }
}
