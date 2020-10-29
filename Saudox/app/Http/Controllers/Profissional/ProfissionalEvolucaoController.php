<?php
namespace App\Http\Controllers\Profissional;

use App\EvolucaoPsicologica;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Profissional;
use App\Paciente;
use Auth;
use Illuminate\Support\Facades\Validator;

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
        $evolucoes = $paciente->evolucaoPsicologicas;
        if(!$evolucoes){
            return redirect()->route('erro', ['msg_erro' => "Evolução do paciente " .$id_paciente. " não existe"]);
        }

        //ordena as evoluções pela data, a mais recente em cima
        $evolucoes = $evolucoes->sortBy('data_evolucao')->reverse();

        return view('profissional/evolucao/neuropsicologia/ver', [
            'evolucoes' => $evolucoes,
            'paciente' => $paciente

        ]);
    }

    public function criarNeuropsicologia($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        return view('profissional/evolucao/neuropsicologia/criar', [
            'paciente' => $paciente,
            'evolucao' => NULL,
        ]);
    }


    public function salvarNeuropsicologia(Request $request) {

        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'id_paciente.exists' => 'O paciente não existe',
            'id_profissional.exists' => 'O paciente não existe',
        ];

        $entrada = $request->all();

        $paciente = Paciente::find($entrada['id_paciente']);
        if(!$paciente) {
            return redirect()->route('erro', ['msg_erro' => "Paciente inexistente"]);
        }

        $validator_evo_psico = Validator::make($entrada, EvolucaoPsicologica::$regras_validacao, $messages);
        if ($validator_evo_psico->fails()) {
            return redirect()->back()
                             ->withErrors($validator_evo_psico)
                             ->withInput();
        }

        $entrada["data_evolucao"] =  $entrada["dia_evolucao"] . " " . $entrada["hora_evolucao"] . ":00";

        $evolucao = new EvolucaoPsicologica;
        $evolucao->fill($entrada);
        $evolucao->save();
        return redirect()->route("profissional.evolucao.neuropsicologica.ver", $entrada["id_paciente"]);
    }



    public function editarNeuropsicologia($id_evolucao) {
        $evolucao = EvolucaoPsicologica::find($id_evolucao);
        if(!$evolucao){
            return redirect()->route('erro', ['msg_erro' => "Evolução não existe"]);
        }

        $evolucao->dia_evolucao = date_format(date_create($evolucao->data_evolucao), 'Y-m-d');
        $evolucao->hora_evolucao = date_format(date_create($evolucao->data_evolucao), 'H:i');

        return view('profissional/evolucao/neuropsicologia/editar', ['evolucao' => $evolucao]);
    }

    public function salvarEditarNeuropsicologia(Request $request) {

        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'id_paciente.exists' => 'O paciente não existe',
            'id_profissional.exists' => 'O paciente não existe',
            'id_evolucao.exists' => 'A evolução não existe',
        ];

        $entrada = $request->all();

        $paciente = Paciente::find($entrada['id_paciente']);
        if(!$paciente) {
            return redirect()->route('erro', ['msg_erro' => "Paciente inexistente"]);
        }

        $evolucao = EvolucaoPsicologica::find($entrada["id_evolucao"]);
        if(!$evolucao){
            return redirect()->route('erro', ['msg_erro' => "Evolução não existe"]);
        }


        $validator_evo_psico = Validator::make($entrada, EvolucaoPsicologica::$regras_validacao_editar, $messages);
        if ($validator_evo_psico->fails()) {
            return redirect()->back()
                             ->withErrors($validator_evo_psico)
                             ->withInput();
        }

        $entrada["data_evolucao"] =  $entrada["dia_evolucao"] . " " . $entrada["hora_evolucao"] . ":00";

        $evolucao->fill($entrada);
        $evolucao->save();
        return redirect()->route("profissional.evolucao.neuropsicologica.ver", $entrada["id_paciente"]);
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
