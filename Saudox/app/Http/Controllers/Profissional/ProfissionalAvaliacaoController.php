<?php
namespace App\Http\Controllers\Profissional;

use App\AvaliacaoJudo;
use App\AvaliacaoTerapiaOcupacional;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Profissional;
use App\Paciente;
use Auth;
use Illuminate\Support\Facades\Validator;

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
        return view('profissional/avaliacao/judo/ver', [
            'avaliacao' => $avaliacao,
            'paciente' => $paciente,
        ]);
    }

    public function criarJudo($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        return view('profissional/avaliacao/judo/criar', ['paciente' => $paciente]);
    }

    public function salvarJudo(Request $request) {

        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'numeric' => 'O campo :attribute deve ser um número.',
            'id_paciente.exists' => 'O paciente não existe',
            'id_profissional.exists' => 'O paciente não existe',
        ];

        $entrada = $request->all();


        $validator_judo = Validator::make($entrada, AvaliacaoJudo::$regras_validacao, $messages);
        if ($validator_judo->fails()) {
            return redirect()->back()
                ->withErrors($validator_judo)
                ->withInput();
        }

        $avaliacao_judo = new AvaliacaoJudo;
        $avaliacao_judo->fill($entrada);
        $avaliacao_judo->save();
        return redirect()->route("profissional.avaliacao.judo.ver", $entrada["id_paciente"]);
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
        return view('profissional/avaliacao/judo/editar', [
            'avaliacao' => $avaliacao,
            'paciente' => $paciente,
        ]);
    }

    public function salvarEditarJudo(Request $request) {

        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'numeric' => 'O campo :attribute deve ser um número.',
            'id_paciente.exists' => 'O paciente não existe',
            'id_profissional.exists' => 'O paciente não existe',
        ];

        $entrada = $request->all();


        $validator_judo = Validator::make($entrada, AvaliacaoJudo::$regras_validacao, $messages);
        if ($validator_judo->fails()) {
            return redirect()->back()
                ->withErrors($validator_judo)
                ->withInput();
        }

        $avaliacao_judo = AvaliacaoJudo::find($entrada["id_avaliacao"]);
        $avaliacao_judo->fill($entrada);
        $avaliacao_judo->save();
        return redirect()->route("profissional.avaliacao.judo.ver", $entrada["id_paciente"]);
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

    public function salvarTerapiaOcupacional(Request $request){
        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'numeric' => 'O campo :attribute deve ser um número.',
            'id_paciente.exists' => 'O paciente não existe',
            'id_profissional.exists' => 'O profissional não existe',
            'max' => 'O campo :attribute é deve ter no maximo :max caracteres.',
        ];

        $entrada = $request->all();


        $validator_to = Validator::make($entrada, AvaliacaoTerapiaOcupacional::$regras_validacao, $messages);
        if ($validator_to->fails()) {
            return redirect()->back()
                ->withErrors($validator_to)
                ->withInput();
        }
        $avaliacao_terapia_ocupacional = new AvaliacaoTerapiaOcupacional;
        $avaliacao_terapia_ocupacional->fill($entrada);
        $avaliacao_terapia_ocupacional->responsavel_por_este_documento = $entrada['id_profissional'];
        $avaliacao_terapia_ocupacional->save();
        return redirect()->route("profissional.avaliacao.terapia_ocupacional.ver", $entrada["id_paciente"]);
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
