<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Paciente;
use Auth;

class PacienteAnamneseController extends Controller
{
    public function home() {
        return view('paciente/anamneses');
    }

    public function ver_fono() {
        $paciente = Paciente::find(Auth::id());
        $anamnese = $paciente->anamnese_fonoaudiologias;
        //TODO: melhorar o erro
        if(!$anamnese) {
            return "não tem essa anamnese";
        }
        return view('paciente/anamneses/fono')->with(["anamnese" => $anamnese]);
    }

    public function ver_pnp() {
        $paciente = Paciente::find(Auth::id());
        $anamnese = $paciente->anamnese__psicopeda__neuro__psicomotos();
        //TODO: melhorar o erro
        if(!$anamnese) {
            return "não tem essa anamnese";
        }
        return view('paciente/anamneses/pnp')->with(["anamnese" => $anamnese]);
    }

    public function ver_tocp() {
        $paciente = Paciente::find(Auth::id());
        $anamnese = $paciente->anamnese__terapia__ocupacionals;
        //TODO: melhorar o erro
        if(!$anamnese) {
            return "não tem essa anamnese";
        }
        return view('paciente/anamneses/tocp')->with(["anamnese" => $anamnese]);
    }
}
