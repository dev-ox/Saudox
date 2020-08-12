<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('paciente.home');
    }

    public function mostrar_erro(Request $req){
        $msg = $req->msg_erro;
        if(!$msg) {$msg = "no msg";}
        return view('erro', ['msg_erro' => $msg]);
    }

}
