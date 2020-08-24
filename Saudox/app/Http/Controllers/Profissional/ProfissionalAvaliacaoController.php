<?php
namespace App\Http\Controllers\Profissional;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Profissional;
use App\Paciente;
use Auth;

class ProfissionalAvaliacaoController extends Controller {

    // FONOAUDIOLOGIA
    public function verFonoaudiologia($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        $avaliacao = $paciente->avaliacaoFono;
        if(!$avaliacao){
            return redirect()->route('erro', ['msg_erro' => "Avaliação do paciente " .$id_paciente. " não existe"]);
        }
        return view('profissional/avaliacao/fonoaudiologia/ver', ['avaliacao' => $avaliacao]);
    }

    public function criarFonoaudiologia($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        return view('profissional/avaliacao/fonoaudiologia/criar', ['paciente' => $paciente]);
    }

    public function editarFonoaudiologia($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        $avaliacao = $paciente->avaliacaoFono;
        if(!$avaliacao){
            return redirect()->route('erro', ['msg_erro' => "Avaliação do paciente " .$id_paciente. " não existe"]);
        }
        return view('profissional/avaliacao/fonoaudiologia/editar', ['avaliacao' => $avaliacao]);
    }


    // JUDO
    public function verJudo($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        $avaliacao = $paciente->avaliacaoJudo;
        if(!$avaliacao){
            return redirect()->route('erro', ['msg_erro' => "Avaliação do paciente " .$id_paciente. " não existe"]);
        }
        return view('profissional/avaliacao/judo/ver', ['avaliacao' => $avaliacao]);
    }

    public function criarJudo($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        return view('profissional/avaliacao/judo/criar', ['paciente' => $paciente]);
    }

    public function editarJudo($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        $avaliacao = $paciente->avaliacaoJudo;
        if(!$avaliacao){
            return redirect()->route('erro', ['msg_erro' => "Avaliação do paciente " .$id_paciente. " não existe"]);
        }
        return view('profissional/avaliacao/judo/editar', ['avaliacao' => $avaliacao]);
    }


    // NEUROPSICOLOGIA
    public function verNeuropsicologia($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        $avaliacao = $paciente->avaliacaoNeuro;
        if(!$avaliacao){
            return redirect()->route('erro', ['msg_erro' => "Avaliação do paciente " .$id_paciente. " não existe"]);
        }
        return view('profissional/avaliacao/neuropsicologia/ver', ['avaliacao' => $avaliacao]);
    }

    public function criarNeuropsicologia($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        return view('profissional/avaliacao/neuropsicologia/criar', ['paciente' => $paciente]);
    }

    public function editarNeuropsicologia($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        $avaliacao = $paciente->avaliacaoNeuro;
        if(!$avaliacao){
            return redirect()->route('erro', ['msg_erro' => "Avaliação do paciente " .$id_paciente. " não existe"]);
        }
        return view('profissional/avaliacao/neuropsicologia/editar', ['avaliacao' => $avaliacao]);
    }


    // TERAPIA OCUPACIONAL
    public function verTerapiaOcupacional($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        $avaliacao = $paciente->avaliacaoTerapiaOcupacional;
        if(!$avaliacao){
            return redirect()->route('erro', ['msg_erro' => "Avaliação do paciente " .$id_paciente. " não existe"]);
        }
        return view('profissional/avaliacao/terapia_ocupacional/ver', ['avaliacao' => $avaliacao]);
    }

    public function criarTerapiaOcupacional($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        return view('profissional/avaliacao/terapia_ocupacional/criar', ['paciente' => $paciente]);
    }

    public function editarTerapiaOcupacional($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        $avaliacao = $paciente->avaliacaoTerapiaOcupacional;
        if(!$avaliacao){
            return redirect()->route('erro', ['msg_erro' => "Avaliação do paciente " .$id_paciente. " não existe"]);
        }
        return view('profissional/avaliacao/terapia_ocupacional/editar', ['avaliacao' => $avaliacao]);
    }

}
