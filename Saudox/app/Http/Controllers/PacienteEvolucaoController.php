<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PacienteEvolucaoController extends Controller
{
    public function home() {
        return view('paciente/evolucoes');
    }
}
