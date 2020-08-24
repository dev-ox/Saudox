<?php
namespace App\Http\Controllers\Profissional;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Profissional;
use App\Paciente;
use Auth;

class ProfissionalEvolucaoController extends Controller {

    // FONOAUDIOLOGIA
    public function verFonoaudiologia($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        $evolucao = $paciente->evolucaoFonoaudiologias;
        if(!$evolucao){
            return redirect()->route('erro', ['msg_erro' => "Evolução do paciente " .$id_paciente. " não existe"]);
        }
        return view('profissional/evolucao/fonoaudiologia/ver', ['evolucao' => $evolucao]);
    }

    public function criarFonoaudiologia($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        return view('profissional/evolucao/fonoaudiologia/criar', ['paciente' => $paciente]);
    }

    public function editarFonoaudiologia($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        $evolucao = $paciente->evolucaoFonoaudiologias;
        if(!$evolucao){
            return redirect()->route('erro', ['msg_erro' => "Evolução do paciente " .$id_paciente. " não existe"]);
        }
        return view('profissional/evolucao/fonoaudiologia/editar', ['evolucao' => $evolucao]);
    }


    // JUDO
    public function verJudo($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        $evolucao = $paciente->evolucaoJudos;
        if(!$evolucao){
            return redirect()->route('erro', ['msg_erro' => "Evolução do paciente " .$id_paciente. " não existe"]);
        }
        return view('profissional/evolucao/judo/ver', ['evolucao' => $evolucao]);
    }

    public function criarJudo($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        return view('profissional/evolucao/judo/criar', ['paciente' => $paciente]);
    }

    public function editarJudo($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        $evolucao = $paciente->evolucaoJudos;
        if(!$evolucao){
            return redirect()->route('erro', ['msg_erro' => "Evolução do paciente " .$id_paciente. " não existe"]);
        }
        return view('profissional/evolucao/judo/editar', ['evolucao' => $evolucao]);
    }


    // NEUROPSICOLOGIA
    public function verNeuropsicologia($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        $evolucao = $paciente->evolucaoPsicologicas;
        if(!$evolucao){
            return redirect()->route('erro', ['msg_erro' => "Evolução do paciente " .$id_paciente. " não existe"]);
        }
        return view('profissional/evolucao/neuropsicologia/ver', ['evolucao' => $evolucao]);
    }

    public function criarNeuropsicologia($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        return view('profissional/evolucao/neuropsicologia/criar', ['paciente' => $paciente]);
    }

    public function editarNeuropsicologia($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        $evolucao = $paciente->evolucaoPsicologicas;
        if(!$evolucao){
            return redirect()->route('erro', ['msg_erro' => "Evolução do paciente " .$id_paciente. " não existe"]);
        }
        return view('profissional/evolucao/neuropsicologia/editar', ['evolucao' => $evolucao]);
    }


    // TERAPIA OCUPACIONAL
    public function verTerapiaOcupacional($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        $evolucoes = $paciente->evolucaoTerapiaOcupacionals;
        if(!$evolucoes){
            return redirect()->route('erro', ['msg_erro' => "Evolução do paciente " .$id_paciente. " não existe"]);
        }
        return view('profissional/evolucao/terapia_ocupacional/ver', ['evolucoes' => $evolucoes]);
    }

    public function criarTerapiaOcupacional($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        return view('profissional/evolucao/terapia_ocupacional/criar', ['paciente' => $paciente]);
    }

    public function editarTerapiaOcupacional($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        $evolucoes = $paciente->evolucaoTerapiaOcupacionals;
        if(!$evolucoes){
            return redirect()->route('erro', ['msg_erro' => "Evolução do paciente " .$id_paciente. " não existe"]);
        }
        return view('profissional/evolucao/terapia_ocupacional/editar', ['evolucoes' => $evolucoes]);
    }

}
