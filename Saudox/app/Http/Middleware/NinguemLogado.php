<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class NinguemLogado {

     // Verifica se algum usuário está logado, caso negativo, ele procede
     public function handle($request, Closure $next) {
        if(Auth::guard('profissional')->check()) {
            return redirect()->route('profissional.home');
        } else if(Auth::guard('paciente')->check()) {
            return redirect()->route('paciente.home');
        }
        return $next($request);
     }
     
}
