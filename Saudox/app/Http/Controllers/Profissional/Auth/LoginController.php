<?php

namespace App\Http\Controllers\Profissional\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Veio do Login do Auth padrão
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth; // Evitar erro de \Auth\Auth

class LoginController extends Controller {

	// Criação do Middlware
	public function __construct() {
		$this->middleware('guest:profissional')->except('logout');
	}

	// Para carregar página de login baseada no login de profissionais
	public function showLoginForm() {
		return view('auth.login',[
			'title' => 'Login de Profissional',
			'loginRoute' => 'profissional.efetuarLogin',
			'forgotPasswordRoute' => 'profissional.password.request',
		]);
	}

	public function login(Request $request) {
		// Validação
		$this->validator($request);

		//Loga como Profissional
		if(Auth::guard('profissional')->attempt($request->only('login','password'),$request->filled('remember'))) {
			return redirect()->route('profissional.home');
		}

		// Caso o login tenha dado errado
		return $this->loginFailed();
	}

	public function logout() {
		Auth::logout();

		// A princípio tive algum tipo de problema quanto ao logout
		// E foi dessa maneira que consegui resolver.
		if(Auth::guard('profissional')->check()) {
			Auth::guard('profissional')->logout();
		} else if(Auth::guard('paciente')->check()) {
			Auth::guard('paciente')->logout();
		}
		return redirect()->route('profissional.login');
	}

	private function validator(Request $request) {
		//Regras de validação
		$rules = [
			'login'    => 'required|exists:profissionals|min:5|max:191',
			'password' => 'required|string|min:4|max:255',
		];

		//Mensagens de error
		$messages = [
			'email.exists' => 'Credenciais não encontradas.',
		];

		// Valida das regras
		$request->validate($rules,$messages);
	}

	private function loginFailed() {
		return redirect()
		->back()
		->withInput()
		->with('errors','Erro ao tentar fazer longin, tente novamente.');
	}





	// Override da função username() em:
	// Illuminate\Foundation\Auth\AuthenticatesUsers.php
	// Para fazer login com outra coisa sem ser o email
	public function username() {
		return 'login';
	}

}
