<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
       

        if(!auth()->user()->userrol_id==2 || !auth()->user()->userrol_id==3)
            return redirect('/login');

        return $next($request);
    }
}
