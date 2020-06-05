<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware {
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request) {
        if (! $request->expectsJson()) {

            // Modificando para em caso de ser um profissional,
            // redireceioná-lo para a página de login correta
            if(Route::is('profissional.*')){
                return route('profissional.login');
            }

            return route('login');
        }
    }
}
