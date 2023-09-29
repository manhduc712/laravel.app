<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAge
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
        if (!$request->session()->has('age')) {
            return redirect(route('age'));
        }

        $sessionAge = $request->session()->get('age');
        if ($sessionAge > 20) {
            $request->session()->forget('age');
            return $next($request);
        } else {
            $request->session()->forget('age');
            return redirect(route('home'))->with('error', 'You are not old enough to view this page');
        }
    }
}
