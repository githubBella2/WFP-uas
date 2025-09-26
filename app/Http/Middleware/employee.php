<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class employee
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
        if(!auth()->check() || auth()->user()->roles_id ==3){
            abort(403);
            // return view('user.shop');
        }

        return $next($request);
    }
}
