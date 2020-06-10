<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PacienteAnamneseController extends Controller
{
    public function home() {
        return view('paciente/anamneses');
    }
}
