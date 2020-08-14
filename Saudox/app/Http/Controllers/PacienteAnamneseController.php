<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Paciente;
use Auth;

class PacienteAnamneseController extends Controller {

    // Redireciona para a página principal das anamneses
    public function home() {
        return view('paciente/anamneses');
    }

    public function verFono() {
        $paciente = Paciente::find(Auth::id());
        $anamnese = $paciente->anamneseFonoaudiologias;
        if(!$anamnese) {
            return redirect()->route('erro', ['msg_erro' => "Essa anamnese não existe."]);
        }
        return view('paciente/anamneses/fono')->with(["anamnese" => $anamnese]);
    }

    public function verPnp() {
        $paciente = Paciente::find(Auth::id());
        // Repare que essa póxima chamada está com os parênteses
        $anamnese = $paciente->anamneseGigantePsicopedaNeuroPsicomotos();
        if(!$anamnese) {
            return redirect()->route('erro', ['msg_erro' => "Essa anamnese não existe."]);
        }
        return view('paciente/anamneses/pnp')->with(["anamnese" => $anamnese]);
    }

    public function verTocp() {
        $paciente = Paciente::find(Auth::id());
        $anamnese = $paciente->anamnese__terapia__ocupacionals;
        if(!$anamnese) {
            return redirect()->route('erro', ['msg_erro' => "Essa anamnese não existe."]);
        }
        return view('paciente/anamneses/tocp')->with(["anamnese" => $anamnese]);
    }

}
