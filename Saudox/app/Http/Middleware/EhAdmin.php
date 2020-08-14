<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

use App\Profissional;

class EhAdmin {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if(Auth::guard('profissional')->check() && Profissional::find(Auth::id())->ehAdmin()){
            return $next($request);
        }
        return redirect('/');
    }
}
