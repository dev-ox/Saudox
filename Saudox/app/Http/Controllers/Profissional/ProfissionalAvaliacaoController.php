<?php
namespace App\Http\Controllers\Profissional;

use App\AvaliacaoFonoaudiologia;
use App\AvaliacaoJudo;
use App\AvaliacaoNeuropsicologica;
use App\AvaliacaoTerapiaOcupacional;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Profissional;
use App\Paciente;
use Auth;
use Illuminate\Support\Carbon;
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

        $avaliacao->respostas = json_decode($avaliacao->respostas);

        return view('profissional/avaliacao/fonoaudiologia/ver', [
            'avaliacao' => $avaliacao,
            'paciente' => $paciente,
        ]);
    }

    public function criarFonoaudiologia($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        return view('profissional/avaliacao/fonoaudiologia/criar', [
            'paciente' => $paciente,
            'avaliacao' => NULL,
        ]);
    }

    public function salvarFonoaudiologia(Request $request) {

        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'numeric' => 'O campo :attribute deve ser um número.',
            'id_paciente.exists' => 'O paciente não existe',
            'id_profissional.exists' => 'O paciente não existe',
        ];

        $entrada = $request->all();

        $paciente = Paciente::find($entrada['id_paciente']);
        if(!$paciente) {
            return redirect()->route('erro', ['msg_erro' => "Paciente inexistente"]);
        }

        $avaliacao_t = $paciente->avaliacaoFono;
        if($avaliacao_t){
            return redirect()->route('erro', ['msg_erro' => "Avaliação do paciente já existe"]);
        }


        $validator_fono = Validator::make($entrada, AvaliacaoFonoaudiologia::$regras_validacao, $messages);
        if ($validator_fono->fails()) {
            return redirect()->back()
                             ->withErrors($validator_fono)
                             ->withInput();
        }

        $entrada["data_avaliacao"] =  $entrada["data_avaliacao"] . " " . $entrada["hora_avaliacao"] . ":00";
        $entrada["respostas"] = json_encode($entrada["respostas"]);

        $avaliacao_fono = new AvaliacaoFonoaudiologia;
        $avaliacao_fono->fill($entrada);
        $avaliacao_fono->save();
        return redirect()->route("profissional.avaliacao.fonoaudiologia.ver", $entrada["id_paciente"]);


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

    public function salvarEditarFonoaudiologia(Request $request) {








        return "falta salvar";
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

        $paciente = Paciente::find($entrada['id_paciente']);
        if(!$paciente) {
            return redirect()->route('erro', ['msg_erro' => "Paciente inexistente"]);
        }

        $avaliacao_t = $paciente->avaliacaoJudo;
        if($avaliacao_t){
            return redirect()->route('erro', ['msg_erro' => "Avaliação do paciente já existe"]);
        }


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
        return view('profissional/avaliacao/neuropsicologia/ver', [
            'avaliacao' => $avaliacao,
            'paciente' => $paciente,
        ]);
    }

    public function criarNeuropsicologia($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        return view('profissional/avaliacao/neuropsicologia/criar', [
            'paciente' => $paciente,
            'avaliacao' => NULL,
        ]);
    }


    public function salvarNeuropsicologia(Request $request) {
        $entrada = $request->all();

        $paciente = Paciente::find($entrada["id_paciente"]);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente inexistente"]);
        }


        $avaliacao_t = $paciente->avaliacaoNeuro;
        if($avaliacao_t){
            return redirect()->route('erro', ['msg_erro' => "Avaliação do paciente já existe"]);
        }

        foreach($entrada["atividades_para_ser_feito_na_clinica"] as $idx => $atv) {
            $limpar_tabela_clinica = true;
            foreach($atv as $coluna => $valor) {
                if($valor != "") {
                    $limpar_tabela_clinica = false;
                    break;
                }
            }

            if($limpar_tabela_clinica) {
                unset($entrada["atividades_para_ser_feito_na_clinica"][$idx]);
            }

        }

        if(sizeof($entrada["atividades_para_ser_feito_na_clinica"]) == 0) {
            $entrada["atividades_para_ser_feito_na_clinica"] = NULL;
        }



        foreach($entrada["atividades_para_ser_feito_em_casa"] as $idx => $atv) {
            $limpar_tabela_clinica = true;
            foreach($atv as $coluna => $valor) {
                if($valor != "") {
                    $limpar_tabela_clinica = false;
                    break;
                }
            }

            if($limpar_tabela_clinica) {
                unset($entrada["atividades_para_ser_feito_em_casa"][$idx]);
            }

        }

        if(sizeof($entrada["atividades_para_ser_feito_em_casa"]) == 0) {
            $entrada["atividades_para_ser_feito_em_casa"] = NULL;
        }


        $entrada["atividades_para_ser_feito_em_casa"] = json_encode($entrada["atividades_para_ser_feito_em_casa"]);
        $entrada["atividades_para_ser_feito_na_clinica"] = json_encode($entrada["atividades_para_ser_feito_na_clinica"]);


        if($request->hasFile("exames_clinicos_se_houver")) {
            $info_arquivo = $request->file("exames_clinicos_se_houver");
            $arquivo_encodado = base64_encode(file_get_contents(addslashes($entrada['exames_clinicos_se_houver'])));

            $dados_arquivo = array(
                "mime" => $info_arquivo->getMimeType(),
                "nome" => $info_arquivo->getClientOriginalName(),
                "bytes_64" => $arquivo_encodado,
            );

            $entrada["exames_clinicos_se_houver"] = strval(json_encode($dados_arquivo));
        } else {
            $entrada["exames_clinicos_se_houver"] = "";
        }



        if($request->hasFile("anexar_arquivos")) {
            $info_arquivo = $request->file("anexar_arquivos");
            $arquivo_encodado = base64_encode(file_get_contents(addslashes($entrada['anexar_arquivos'])));

            $dados_arquivo = array(
                "mime" => $info_arquivo->getMimeType(),
                "nome" => $info_arquivo->getClientOriginalName(),
                "bytes_64" => $arquivo_encodado,
            );

            $entrada["anexar_arquivos"] = strval(json_encode($dados_arquivo));
        } else {
            $entrada["anexar_arquivos"] = "";
        }

        $entrada["dia_hora_devolutiva_aos_responsavel"] = $entrada["dia_devolutiva"] . " " . $entrada["hora_devolutiva"] . ":00";

        $avaliacao = new AvaliacaoNeuropsicologica;
        $avaliacao->fill($entrada);
        $avaliacao->save();

        return redirect()->route('profissional.avaliacao.neuropsicologia.ver', ['id_paciente' => $paciente->id]);



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


        $avaliacao->dia_devolutiva = Carbon::parse($avaliacao->dia_hora_devolutiva_aos_responsavel)->format("Y-m-d");
        $avaliacao->hora_devolutiva= Carbon::parse($avaliacao->dia_hora_devolutiva_aos_responsavel)->format("H:i");

        return view('profissional/avaliacao/neuropsicologia/editar', [
            'paciente' => $paciente,
            'avaliacao' => $avaliacao,
            'tabela_atividades_para_ser_feito_na_clinica' => json_decode($avaliacao->atividades_para_ser_feito_na_clinica),
            'tabela_atividades_para_ser_feito_em_casa' => json_decode($avaliacao->atividades_para_ser_feito_em_casa),
        ]);
    }


    public function salvarEditarNeuropsicologia(Request $request) {
        $entrada = $request->all();

        $paciente = Paciente::find($entrada["id_paciente"]);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente inexistente"]);
        }

        $avaliacao = $paciente->avaliacaoNeuro;
        if(!$avaliacao) {
            return redirect()->route('erro', ['msg_erro' => "Avaliação inexistente"]);
        }


        foreach($entrada["atividades_para_ser_feito_na_clinica"] as $idx => $atv) {
            $limpar_tabela_clinica = true;
            foreach($atv as $coluna => $valor) {
                if($valor != "") {
                    $limpar_tabela_clinica = false;
                    break;
                }
            }

            if($limpar_tabela_clinica) {
                unset($entrada["atividades_para_ser_feito_na_clinica"][$idx]);
            }

        }

        if(sizeof($entrada["atividades_para_ser_feito_na_clinica"]) == 0) {
            $entrada["atividades_para_ser_feito_na_clinica"] = NULL;
        }



        foreach($entrada["atividades_para_ser_feito_em_casa"] as $idx => $atv) {
            $limpar_tabela_clinica = true;
            foreach($atv as $coluna => $valor) {
                if($valor != "") {
                    $limpar_tabela_clinica = false;
                    break;
                }
            }

            if($limpar_tabela_clinica) {
                unset($entrada["atividades_para_ser_feito_em_casa"][$idx]);
            }

        }

        if(sizeof($entrada["atividades_para_ser_feito_em_casa"]) == 0) {
            $entrada["atividades_para_ser_feito_em_casa"] = NULL;
        }


        $entrada["atividades_para_ser_feito_em_casa"] = json_encode($entrada["atividades_para_ser_feito_em_casa"]);
        $entrada["atividades_para_ser_feito_na_clinica"] = json_encode($entrada["atividades_para_ser_feito_na_clinica"]);


        if($request->hasFile("exames_clinicos_se_houver")) {
            $info_arquivo = $request->file("exames_clinicos_se_houver");
            $arquivo_encodado = base64_encode(file_get_contents(addslashes($entrada['exames_clinicos_se_houver'])));

            $dados_arquivo = array(
                "mime" => $info_arquivo->getMimeType(),
                "nome" => $info_arquivo->getClientOriginalName(),
                "bytes_64" => $arquivo_encodado,
            );

            $entrada["exames_clinicos_se_houver"] = strval(json_encode($dados_arquivo));
        } else {
            $entrada["exames_clinicos_se_houver"] = "";
        }



        if($request->hasFile("anexar_arquivos")) {
            $info_arquivo = $request->file("anexar_arquivos");
            $arquivo_encodado = base64_encode(file_get_contents(addslashes($entrada['anexar_arquivos'])));

            $dados_arquivo = array(
                "mime" => $info_arquivo->getMimeType(),
                "nome" => $info_arquivo->getClientOriginalName(),
                "bytes_64" => $arquivo_encodado,
            );

            $entrada["anexar_arquivos"] = strval(json_encode($dados_arquivo));
        } else {
            $entrada["anexar_arquivos"] = "";
        }

        $entrada["dia_hora_devolutiva_aos_responsavel"] = $entrada["dia_devolutiva"] . " " . $entrada["hora_devolutiva"] . ":00";


        $avaliacao->fill($entrada);
        $avaliacao->save();

        return redirect()->route('profissional.avaliacao.neuropsicologia.ver', ['id_paciente' => $paciente->id]);

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
        return view('profissional/avaliacao/terapia_ocupacional/ver', [
            'avaliacao' => $avaliacao,
            'paciente' => $paciente,
        ]);
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

        $paciente = Paciente::find($entrada['id_paciente']);
        if(!$paciente) {
            return redirect()->route('erro', ['msg_erro' => "Paciente inexistente"]);
        }

        $avaliacao_t = $paciente->avaliacaoTerapiaOcupacional;
        if($avaliacao_t){
            return redirect()->route('erro', ['msg_erro' => "Avaliação do paciente já existe"]);
        }



        $validator_to = Validator::make($entrada, AvaliacaoTerapiaOcupacional::$regras_validacao, $messages);
        if ($validator_to->fails()) {
            return redirect()->back()
                             ->withErrors($validator_to)
                             ->withInput();
        }
        $avaliacao_terapia_ocupacional = new AvaliacaoTerapiaOcupacional;
        $avaliacao_terapia_ocupacional->fill($entrada);
        $avaliacao_terapia_ocupacional->responsavel_por_este_documento = $entrada['id_profissional'];
        $avaliacao_terapia_ocupacional->data_avaliacao = date("Y-m-d");
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
        return view('profissional/avaliacao/terapia_ocupacional/editar', [
            'avaliacao' => $avaliacao,
            'paciente' => $paciente,
        ]);
    }

    public function salvarEditarTerapiaOcupacional(Request $request){
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
        $avaliacao_terapia_ocupacional = AvaliacaoTerapiaOcupacional::find($entrada["id_avaliacao"]);
        $avaliacao_terapia_ocupacional->fill($entrada);
        $avaliacao_terapia_ocupacional->save();
        return redirect()->route("profissional.avaliacao.terapia_ocupacional.ver", $entrada["id_paciente"]);

    }

}
