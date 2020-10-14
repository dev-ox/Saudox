<?php

namespace App\Http\Controllers;

use App\Profissional;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {

    // Redireciona para a página inicial do site (/)
    public function home() {
        if  (!Auth::guard('profissional')->check() && !Auth::guard('paciente')->check()){
            return view('welcome');
        } else {
            return redirect()->route('profissional.home');
        }
    }

    // Redireciona para a página de erro (passando a mensagem de erro)
    public function mostrarErro(Request $req) {
        $msg = $req->msg_erro;
        if(!$msg) {$msg = "no msg";}
        return view('erro', ['msg_erro' => $msg]);
    }

}
