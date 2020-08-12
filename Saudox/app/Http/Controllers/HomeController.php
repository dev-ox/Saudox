<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller {

    // Redireciona para a página inicial do site (/)
    public function home() {
        return view('welcome');
    }

    // Redireciona para a página de erro (passando a mensagem de erro)
    public function mostrar_erro(Request $req) {
        $msg = $req->msg_erro;
        if(!$msg) {$msg = "no msg";}
        return view('erro', ['msg_erro' => $msg]);
    }

}
