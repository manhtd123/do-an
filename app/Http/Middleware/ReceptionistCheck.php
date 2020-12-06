<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ReceptionistCheck
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
        if (Auth::user()->department_id == 3) {
            return redirect()->route('chief.index');
        } else if (Auth::user()->department_id == 2) {
            return redirect()->route('menu.index');
        } else {
            return $next($request);
        }
    }
}
