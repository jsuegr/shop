<?php

namespace App\Http\Middleware;

use Closure;

class AdminProviderMiddleware
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
        if (auth()->user()->userrol_id==1) {
            return redirect('/');
        }
       
        return $next($request);
    }
}
