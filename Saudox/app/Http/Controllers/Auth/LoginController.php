<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth; // Evitar erro de \Auth\Auth

class LoginController extends Controller {
    use AuthenticatesUsers;


    /**
    * Where to redirect users after login.
    *
    * @var string
    */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/paciente/home';

    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct() {

        // Verifica se ja tem alguem logado, se tiver, nao faz login
        // Obrigado Deus!
        $this->middleware('guest:paciente')->except('logout');
        $this->middleware('guest:profissional')->except('logout');
    }

    // Para carregar página de login baseada no login de paciente
    public function showLoginForm() {
        return view('auth.login',[
            'title' => 'Login de Paciente',
            'loginRoute' => 'login',
            'forgotPasswordRoute' => 'password.request',
        ]);
    }

    public function logout() {
        Auth::logout();

        // A princípio tive algum tipo de problema quanto ao logout
        // E foi dessa maneira que consegui resolver.
        if(Auth::guard('paciente')->check()) {
            Auth::guard('paciente')->logout();
        } else if(Auth::guard('profissional')->check()) {
            Auth::guard('profissional')->logout();
        }
        return redirect('/login')->with('status','User has been logged out!');
    }





    // Override da função username() em:
    // Illuminate\Foundation\Auth\AuthenticatesUsers.php
    // Para fazer login com outra coisa sem ser o email
    public function username() {
        return 'login';
    }


}
