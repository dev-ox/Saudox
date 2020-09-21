<?php
namespace App\Http\Controllers\Profissional;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Paciente;
use App\Profissional;
use App\Endereco;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ProfissionalController extends Controller {

    public function home() {
        $profissional = Profissional::find(Auth::id());
        $profissoes = $profissional->getProfissoes();
        $agendamentos = $profissional->agendamentos;

        // TODO: Lembrar de quando implementar o sistema de marcar agendamentos
        //      como concluído, alterar essa chamada para pegar agendamentes
        //      pendentes apenas
        $prox_paciente = NULL;

        if(count($agendamentos) > 0){
            $prox_paciente = Paciente::where('cpf', $agendamentos[0]->cpf)->first();
        }

        return view('profissional/home',
            [
                'profissional' =>$profissional,
                'agenda' =>$agendamentos,
                'profissoes' => $profissoes,
                'prox_paciente' => $prox_paciente,
            ]);
    }


    public function verProfissional($id) {
        $profissional = Profissional::find($id);
        $profissoes = $profissional->getProfissoes();
        $agenda = $profissional->agendamentos;

        if($profissional){
            return view('profissional/ver_profissional',
            [
              'profissional' => $profissional,
              'profissoes' => $profissoes,
              'agenda' => $agenda,
            ]);
        } else {
            return redirect()->route('erro', ['msg_erro' => "Profissional inexistente"]);
        }
    }

    public function verPaciente($id) {
        $paciente = Paciente::find($id);
        if($paciente){
            return view('profissional/ver_paciente', ['paciente' => $paciente]);
        } else {
            return redirect()->route('erro', ['msg_erro' => "Paciente inexistente"]);
        }
    }


    public function cadastroPaciente() {
        return view('profissional/criar_paciente');
    }

    public function salvarCadastrarPaciente(Request $request) {
        $entrada = $request->all();

        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'min' => 'O campo :attribute é deve ter no minimo :min caracteres.',
            'max' => 'O campo :attribute é deve ter no máximo :max caracteres.',
            'password.required' => 'A senha é obrigatória.',
            'gt' => 'A campo :attribute deve ser maior que :gt'
        ];

        $time = strtotime($entrada['data_nascimento']);
        $entrada['data_nascimento'] = date('Y-m-d',$time);

        if($entrada['lista_irmaos'] == "") {
            $entrada['lista_irmaos'] = "Nenhum";
        }

        if($entrada['pais_sao_casados'] == 1){
            $entrada['pais_sao_divorciados'] = 0;
        }

        $validator_endereco = Validator::make($entrada, Endereco::$regras_validacao, $messages);
        if ($validator_endereco->fails()) {
            return redirect()->back()
                             ->withErrors($validator_endereco)
                             ->withInput();
        }

        $validator_paciente = Validator::make($entrada, Paciente::$regras_validacao, $messages);
        if ($validator_paciente->fails()) {
            return redirect()->back()
                             ->withErrors($validator_paciente)
                             ->withInput();
        }



        $endereco = new Endereco;
        $endereco->fill($entrada);
        $endereco->save();



        $paciente = new Paciente;
        $paciente->fill($entrada);
        $paciente->id_endereco = $endereco->id;

        $paciente->password = Hash::make($entrada['password']);
        $paciente->save();

        return redirect()->route('profissional.ver_paciente', $paciente->id);
    }


    public function editarPaciente($id_paciente) {

        $paciente = Paciente::find($id_paciente);

        if($paciente){
            return view('profissional/editar_paciente', ['paciente' => $paciente]);
        } else {
            return view('erro', ['msg_erro' => "Paciente inexistente"]);
        }

    }



    public function salvarEditarPaciente(Request $request) {

        $entrada = $request->all();
        $paciente = Paciente::find($entrada['id']);

        if(!$paciente) {
            return view('erro', ['msg_erro' => "Paciente inexistente..."]);
        }

        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'min' => 'O campo :attribute é deve ter no minimo :min caracteres.',
            'max' => 'O campo :attribute é deve ter no máximo :max caracteres.',
            'password.required' => 'A senha é obrigatória.',
            'gt' => 'A campo :attribute deve ser maior que :gt'
        ];

        $validator_endereco = Validator::make($entrada, Endereco::$regras_validacao, $messages);
        if ($validator_endereco->fails()) {
            return redirect()->back()
                             ->withErrors($validator_endereco)
                             ->withInput();
        }


        $regra_validacao_aux = Paciente::$regras_validacao_editar_com_senha;
        if($entrada['password'] == "" || !isset($entrada['password'])) {
            $regra_validacao_aux = Paciente::$regras_validacao_editar_sem_senha;
        }


        $validator_paciente = Validator::make($entrada, $regra_validacao_aux, $messages);
        if ($validator_paciente->fails()) {
            return redirect()->back()
                             ->withErrors($validator_paciente)
                             ->withInput();
        }

        $endereco = Endereco::find($paciente->endereco->id);
        $endereco->fill($entrada);
        $endereco->save();

        $paciente->fill($entrada);

        //Se existe o campo password, e o campo password não está vazio (foi modificado)
        if(isset($entrada['password']) && $entrada['password'] != "") {
            $paciente->password = Hash::make($entrada['password']);
        }

        $paciente->save();
        return redirect()->route('profissional.ver_paciente', $paciente->id);
    }

    public function buscarUsuario(Request $request) {
        $req = $request->all();

        $buscou = false; // true/false indicando se buscou ou não
        $tipo_user = ''; // paciente ou profissional
        $tipo_busca = ''; // cpf ou nome
        $info = ''; // String buscada
        $pacientes_array = array();
        $profissionais_array = array();
        $busca_ok = false;

        if(count($req) > 0) {
            // Se a busca foi realizada, ele seta os valores recebidos via post
            $buscou = $req['buscou'];
            $tipo_user = $req['tipo_user'];
            $tipo_busca = $req['tipo_busca'];
            $info = $req['info'];

            // Se o usuário do sistema fez uma busca
            if($buscou) {
                // Se o tipo de usuário que ele está buscando for paciente
                if($tipo_user == 'paciente') {
                    // Coleta apenas informações necessárias
                    $pacientes_aux = Paciente::select('id', 'nome_paciente', 'cpf')->get();

                    // Verifica se algum usuário possui no seu cpf ou nome a string buscada
                    if($tipo_busca == 'cpf') {
                        $busca_ok = true; // Indicativo que a o conteúdo do request está ok
                        foreach ($pacientes_aux as $pac) {
                            // Se a string contém a substring
                            if(str_contains($pac->cpf, $info)) {
                                // Adiciona aquele paciente um vetor de resultados
                                array_push($pacientes_array, $pac);
                            }
                        }
                    } else if($tipo_busca == 'nome') {
                        $busca_ok = true;
                        foreach ($pacientes_aux as $pac) {
                            if(str_contains($pac->nome_paciente, $info)) {
                                array_push($pacientes_array, $pac);
                            }
                        }
                    }
                // Se o tipo de usuário que ele está buscando for paciente
                } else if($tipo_user == 'profissional') {
                    $profissional_aux = Profissional::select('id', 'nome', 'cpf')->get();
                    if($tipo_busca == 'cpf') {
                        $busca_ok = true;
                        foreach ($profissional_aux as $prof) {
                            if(str_contains($prof->cpf, $info)) {
                                array_push($profissionais_array, $prof);
                            }
                        }
                    } else if($tipo_busca == 'nome') {
                        $busca_ok = true;
                        foreach ($profissional_aux as $prof) {
                            if(str_contains($prof->nome, $info)) {
                                array_push($profissionais_array, $prof);
                            }
                        }
                    }
                }
            }
            if(!$busca_ok) {
                return view('erro', ['msg_erro' => "Por favor, informe dados válidos para a busca."]);
            }
        }

        return view('profissional/buscar', [
            'buscou' => $buscou,
            'tipo_user' => $tipo_user,
            'tipo_busca' => $tipo_busca,
            'info' => $info,
            'pacientes' => $pacientes_array,
            'profissionais' => $profissionais_array
        ]);
    }

    public function editarAviso(Request $request) {

        $entrada = $request->all();

        //Se quem tentou editar não for a pessoa do perfil, nem admin, então temos problema
        if($entrada['id'] != Auth::id() && !Profissional::find(Auth::id())->ehAdmin()) {
            return view('erro', ['msg_erro' => "Tentando editar o aviso de outra pessoa?"]);
        }

        $profissional = Profissional::find($entrada['id']);
        if(!$profissional) {
            return view('erro', ['msg_erro' => "Profissional não encontrado..."]);
        }

        //Se tiver em branco, deixa null no bd
        if(isset($entrada['aviso']) && $entrada['aviso'] != "") {
            $profissional->aviso = $entrada['aviso'];
        } else {
            $profissional->aviso = NULL;
        }

        $profissional->save();
        return redirect()->back();

    }

}
