<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AlguemLogado {

    // É verificado se tem algum tipo de usuário logado, se positivo, procede
    public function handle($request, Closure $next) {
        if(Auth::guard('profissional')->check() || Auth::guard('paciente')->check()) {
            return $next($request);
        }
        return redirect('/');
    }
    
}
