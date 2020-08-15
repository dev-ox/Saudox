<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PacienteEvolucaoController extends Controller {

    // Redirecionamento para a home das evoluções do paciente
    public function home() {
        return view('paciente/evolucoes');
    }

}
