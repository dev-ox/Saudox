<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AlguemLogado {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if(Auth::guard('profissional')->check() || Auth::guard('paciente')->check()) {
            return $next($request);
        }
        return redirect('/');
    }
}
