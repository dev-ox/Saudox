<?php

namespace App\Http\Controllers\Profissional\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Veio do Login do Auth padrão
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth; // Evitar erro de \Auth\Auth

class LoginController extends Controller {

	// Para carregar página de login baseada no login de profissionais
	public function showLoginForm() {
		return view('auth.login',[
			'title' => 'Profissional Login',
			'loginRoute' => 'profissional.login',
			'forgotPasswordRoute' => 'profissional.password.request',
		]);
	}


	public function login(Request $request) {
		// Validação
		$this->validator($request);

		//Loga como Profissional
		if(Auth::guard('profissional')){
			redirect('profissional.home');
		}

		// Caso o login tenha dado errado
		return $this->loginFailed();
	}


	public function logout() {
		Auth::logout();
		Session::flush();
		return redirect('profissional.login');
	}


	// TODO: Alterar essa validação (email não é utilizado)
	private function validator(Request $request) {
		//Regras de validação
		$rules = [
			// 'email'    => 'required|email|exists:profissionals|min:5|max:191',
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
		->with('error','Erro ao tentar fazer longin, tente novamente.');
	}

	// Override da função username() em:
	// Illuminate\Foundation\Auth\AuthenticatesUsers.php
	// Para fazer login com outra coisa sem ser o email
	public function username() {
		return 'login';
	}

}
