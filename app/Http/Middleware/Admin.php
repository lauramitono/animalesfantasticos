<?php

namespace App\Http\Middleware;

use Closure;
use Session;

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
		
		//if(!Session::has('usuarioadmin')) {
		if(\Auth::user()->tipo_usuario != "admin") {
            return redirect(url('/'));
        }

		//continúa tu camino
        return $next($request);
    }
}
