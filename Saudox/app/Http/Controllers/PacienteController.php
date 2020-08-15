<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Paciente;
use Auth;

class PacienteController extends Controller {

    // Uma forma de forçar que o uso da classe passe pelo middlware (garantia)
    public function __construct(){
        $this->middleware('auth');
    }

    // Redireciona para a home do profissional
    public function home(){
        return view('paciente.home');
    }

}
