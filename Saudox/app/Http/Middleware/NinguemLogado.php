<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class NinguemLogado {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function handle($request, Closure $next) {
        if(Auth::guard('profissional')->check()) {
            return redirect()->route('profissional.home');
        } else if(Auth::guard('paciente')->check()) {
            return redirect()->route('paciente.home');
        }
        return $next($request);
     }
}
