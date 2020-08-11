<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */


    public function handle($request, Closure $next, $guard = null) {
        if (Auth::guard($guard)->check()) {
            if($guard == "profissional"){
                // Se estiver autenticado como profissional
                return redirect()->route('profissional.home');
            } else {
                // Guard Padrão
                return redirect()->route('paciente.home');
            }
        }

        return $next($request);
    }
}
