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


    // É verificado se tem algum tipo de usuário logado, se positivo, procede
    public function handle($request, Closure $next) {
        if(Auth::guard('profissional')->check() || Auth::guard('paciente')->check()) {
            return $next($request);
        }
        return redirect('/');
    }
}
