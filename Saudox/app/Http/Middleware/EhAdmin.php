<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

use App\Profissional;

class EhAdmin {

    // Verifica se tem algum profissional logado e se esse profissional é admin
    public function handle($request, Closure $next) {
        if(Auth::guard('profissional')->check() && Profissional::find(Auth::id())->eh_admin()){
            return $next($request);
        }
        return redirect()->route('erro', ['msg_erro' => "Você não é admin!!"]);
    }
    
}
