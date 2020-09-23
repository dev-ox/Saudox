<?php
namespace App\Http\Controllers\Profissional;

use App\Agendamentos;
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
        $agendamentos = $profissional->agendamentos->where('status', '1');

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


    public function cadastroPaciente($id_agendamento = 0) {

        $agendamento = Agendamentos::find($id_agendamento);

        //Entrega um agendamento em branco, só pra facilitar
        if(!$agendamento) {
            $agendamento = new Agendamentos;
            $agendamento->endereco = new Endereco;
        }

        return view('profissional/criar_paciente', ['agendamento' => $agendamento]);
    }

    public function salvarCadastrarPaciente(Request $request) {
        $entrada = $request->all();

        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'min' => 'O campo :attribute é deve ter no minimo :min caracteres.',
            'max' => 'O campo :attribute é deve ter no máximo :max caracteres.',
            'password.required' => 'A senha é obrigatória.',
            'gt' => 'O campo :attribute deve ser maior que 18.',
            'lt' => 'O campo :attribute deve ser menor que 100.',
            'unique' => 'O :attribute já está cadastrado',
        ];

        if($entrada['lista_irmaos'] == "") {
            $entrada['lista_irmaos'] = "Nenhum";
        }

        $rota_erro = "profissional.criar_paciente";

        if(!isset($entrada["data_nascimento"])
            || $entrada["data_nascimento"] == ""
            || $entrada["data_nascimento"] == NULL
            || !strtotime($entrada["data_nascimento"])
            || !$this->validatarData($entrada["data_nascimento"])
        ) {

            return redirect()->route($rota_erro)
                             ->withErrors(['data_nascimento'=>'Data de nascimento inválida!'])
                             ->withInput();
        }

        $time = strtotime($entrada['data_nascimento']);
        $entrada['data_nascimento'] = date('Y-m-d',$time);

        if($entrada["sexo"] != "0" && $entrada["sexo"] != "1") {
            return redirect()->route($rota_erro)
                             ->withErrors(['sexo'=>'Sexo inválido!'])
                             ->withInput();
        }


        if(!$this->validarTelefone($entrada["telefone_mae"])) {
            return redirect()->route($rota_erro)
                             ->withErrors(['telefone_mae'=>'Telefone da mãe inválido!'])
                             ->withInput();
        }

        if(!$this->validarTelefone($entrada["telefone_pai"])) {
            return redirect()->route($rota_erro)
                             ->withErrors(['telefone_pai'=>'Telefone do pai inválido!'])
                             ->withInput();
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

        $validar_cpf = $this->validaCPF($entrada['cpf']);
        if (!$validar_cpf) {
            return redirect()->back()
                             ->withErrors(['cpf'=>'Cpf inválido!'])
                             ->withInput();
        }

        $paciente = new Paciente;
        $paciente->fill($entrada);
        $paciente->pais_sao_casados= $entrada['pais_sao_casados'] == "1";
        $paciente->pais_sao_divorciados = false;

        if(isset($entrada["pais_sao_divorciados"]) && ($entrada["pais_sao_divorciados"] == "1")) {
            $paciente->pais_sao_divorciados = true;
        }

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
            'gt' => 'O campo :attribute deve ser maior que 18.',
            'lt' => 'O campo :attribute deve ser menor que 100.',
            'unique' => 'O :attribute já está cadastrado',
        ];

        if($entrada['lista_irmaos'] == "") {
            $entrada['lista_irmaos'] = "Nenhum";
        }

        $rota_erro = "profissional.criar_paciente.editar";


        if(!isset($entrada["data_nascimento"])
            || $entrada["data_nascimento"] == ""
            || $entrada["data_nascimento"] == NULL
            || !strtotime($entrada["data_nascimento"])
            || !$this->validatarData($entrada["data_nascimento"])
        ) {

            return redirect()->route($rota_erro)
                             ->withErrors(['data_nascimento'=>'Data de nascimento inválida!'])
                             ->withInput();
        }

        $time = strtotime($entrada['data_nascimento']);
        $entrada['data_nascimento'] = date('Y-m-d',$time);

        if($entrada["sexo"] != "0" && $entrada["sexo"] != "1") {
            return redirect()->route($rota_erro)
                             ->withErrors(['sexo'=>'Sexo inválido!'])
                             ->withInput();
        }


        if(!$this->validarTelefone($entrada["telefone_mae"])) {
            return redirect()->route($rota_erro)
                             ->withErrors(['telefone_mae'=>'Telefone da mãe inválido!'])
                             ->withInput();
        }

        if(!$this->validarTelefone($entrada["telefone_pai"])) {
            return redirect()->route($rota_erro)
                             ->withErrors(['telefone_pai'=>'Telefone do pai inválido!'])
                             ->withInput();
        }



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

        $validar_cpf = $this->validaCPF($entrada['cpf']);
        if (!$validar_cpf) {
            return redirect()->back()
                             ->withErrors(['cpf'=>'Cpf inválido!'])
                             ->withInput();
        }

        $paciente->fill($entrada);
        $paciente->pais_sao_casados= $entrada['pais_sao_casados'] == "1";

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
            if(!$info || $info == '') {
                return view('erro', ['msg_erro' => "Por favor, informe dados válidos para a busca. (Você não indicou o o que de fato quer buscar.)"]);
            }

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
