<?php

namespace App\Http\Controllers;

use App\Paciente;
use Illuminate\Support\Facades\Auth;

class PacienteAvaliacaoController extends Controller {

    /* É tranquilo usar usar o auth direto, já que as rotas são protegidas
     * pelo middleware, então é garantido que quem tá logado é um paciente
     *
     * Pacientes só podem ver as avaliações, então uma view pra cada é mais que
     * suficiente
     */

    public function ver_fono() {
        $paciente = Paciente::find(Auth::id());
        $avaliacao = $paciente->avaliacao_fono;
        if(!$avaliacao) {
            return redirect()->route('erro', ['msg_erro' => "Essa avaliação não existe."])
        }
        return view('paciente/avaliacoes/fono')->with(["avaliacao" => $avaliacao]);
    }

    public function ver_judo() {
        $paciente = Paciente::find(Auth::id());
        $avaliacao = $paciente->avaliacao_judo;
        if(!$avaliacao) {
            return redirect()->route('erro', ['msg_erro' => "Essa avaliação não existe."])
        }
        return view('paciente/avaliacoes/judo')->with(["avaliacao" => $avaliacao]);
    }

    public function ver_neuro() {
        $paciente = Paciente::find(Auth::id());
        $avaliacao = $paciente->avaliacao_neuro;
        if(!$avaliacao) {
            return redirect()->route('erro', ['msg_erro' => "Essa avaliação não existe."])
        }
        return view('paciente/avaliacoes/neuro')->with(["avaliacao" => $avaliacao]);
    }

    public function ver_terapia_ocupacional() {
        $paciente = Paciente::find(Auth::id());
        $avaliacao = $paciente->avaliacao_terapia_ocupacional;
        if(!$avaliacao) {
            return redirect()->route('erro', ['msg_erro' => "Essa avaliação não existe."])
        }
        return view('paciente/avaliacoes/terapia_ocupacional')->with(["avaliacao" => $avaliacao]);
    }

}
