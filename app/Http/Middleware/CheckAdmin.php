<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdmin
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
        if (session()->has('user_info')) {
            $access = session()->get('user_info')['department_id'];
            if($access != 1){
                return redirect(route('home'))->with('error', 'You do not have permission to access');
            }
            return $next($request);
        } else {
            return redirect(route('login'))->with('error', 'You must login to access');
        }
    }
}
