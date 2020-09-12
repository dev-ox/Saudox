<?php
namespace App\Http\Controllers\Profissional;

use App\Agendamentos;
use App\Convenios;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Paciente;
use App\Profissional;
use App\Endereco;
use Auth;
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
        if($profissional){
            return view('profissional/ver_profissional',
            [
              'profissional' => $profissional,
              'profissoes' => $profissoes,
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


    public function agendarPaciente($id_paciente = -1) {

        $paciente = NULL;
        if($id_paciente == -1) {
            $paciente = new Paciente;
            $paciente->endereco = new Endereco;
        } else {
            $paciente = Paciente::find($id_paciente);
        }

        if(!$paciente) {
            return view('erro', ['msg_erro' => "Paciente inexistente"]);
        }

        $convenios = Convenios::all();
        $profissionais = Profissional::all();

        return view('profissional/agendar', [
            'paciente' => $paciente,
            'convenios' => $convenios,
            'profissionais' => $profissionais,
        ]);


    }

    public function salvarAgendarPaciente(Request $request) {

        $entrada = $request->all();

        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'min' => 'O campo :attribute é deve ter no minimo :min caracteres.',
            'max' => 'O campo :attribute é deve ter no máximo :max caracteres.',
        ];


        $validator_endereco = Validator::make($entrada, Endereco::$regras_validacao, $messages);
        if ($validator_endereco->fails()) {
            return redirect()->back()
                             ->withErrors($validator_endereco)
                             ->withInput();
        }

        $validator_agendamento = Validator::make($entrada, Agendamentos::$regras_validacao, $messages);
        if ($validator_agendamento->fails()) {
            return redirect()->back()
                             ->withErrors($validator_agendamento)
                             ->withInput();
        }



        //TODO: tratar duplicação de endereço
        $endereco = new Endereco;
        $endereco->fill($entrada);
        $endereco->save();

        $agendamento = new Agendamentos;
        $agendamento->fill($entrada);
        $agendamento->id_endereco = $endereco->id;

        if($entrada['id_convenio'] != "0") {
            $agendamento->id_convenio = $entrada['id_convenio'];
        }

        $data_entrada = $entrada['dia_da_consulta'] . " " . $entrada['hora_entrada'] . ":00";
        $data_saida = $entrada['dia_da_consulta'] . " " . $entrada['hora_saida'] . ":00";

        $agendamento->data_entrada = $data_entrada;
        $agendamento->data_saida = $data_saida;

        if(isset($entrada['recorrencia_do_agendamento'])) {
            $agendamento->recorrencia_do_agendamento = true;
            $agendamento->tipo_da_recorrencia = $entrada['tipo_da_recorrencia'];
        } else {
            $agendamento->recorrencia_do_agendamento = false;
        }

        $agendamento->status = true;
        $agendamento->save();

        return redirect()->route('profissional.agendamento.ver', $agendamento->id);

    }

    public function verAgendamentoPaciente($id_agendamento) {
        $agendamento = Agendamentos::find($id_agendamento);

        if($agendamento) {
            return view('profissional/ver_agendamento', ['agendamento' => $agendamento]);
        } else {
            return view('erro', ['msg_erro' => "Agendamento inexistente"]);
        }
    }

    public function marcarAgendamentoConcluido($id_agendamento) {
        $agendamento = Agendamentos::find($id_agendamento);

        $agendamento->status = false;
        $agendamento->save();

        if($agendamento) {
            return view('profissional/ver_agendamento', ['agendamento' => $agendamento]);
        } else {
            return view('erro', ['msg_erro' => "Agendamento inexistente"]);
        }
    }

    public function editarAgendamentoPaciente($id_agendamento) {
        $agendamento = Agendamentos::find($id_agendamento);
        $convenios = Convenios::all();
        $profissionais = Profissional::all();

        if($agendamento) {
            return view('profissional/editar_agendamento', [
                'agendamento' => $agendamento,
                'convenios' => $convenios,
                'profissionais' => $profissionais,

            ]);
        } else {
            return view('erro', ['msg_erro' => "Agendamento inexistente"]);
        }
    }


    public function salvarEditarAgendarPaciente(Request $request) {

        $entrada = $request->all();
        $agendamento = Agendamentos::find($entrada['id']);
        $convenios = Convenios::all();
        $profissionais = Profissional::all();

        if(!$agendamento) {
            return view('erro', ['msg_erro' => "Agendamento inexistente"]);
        }

        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'min' => 'O campo :attribute é deve ter no minimo :min caracteres.',
            'max' => 'O campo :attribute é deve ter no máximo :max caracteres.',
        ];


        $validator_endereco = Validator::make($entrada, Endereco::$regras_validacao, $messages);
        if ($validator_endereco->fails()) {
            return view('profissional/editar_agendamento', [
                'agendamento' => $agendamento,
                'convenios' => $convenios,
                'profissionais' => $profissionais,

            ])->withErrors($validator_endereco->errors());
        }

        $validator_agendamento = Validator::make($entrada, Agendamentos::$regras_validacao, $messages);
        if ($validator_agendamento->fails()) {
            return view('profissional/editar_agendamento', [
                'agendamento' => $agendamento,
                'convenios' => $convenios,
                'profissionais' => $profissionais,

            ])->withErrors($validator_endereco->errors());
        }



        $agendamento->fill($entrada);
        $agendamento->endereco->fill($entrada);

        if($entrada['id_convenio'] != "0") {
            $agendamento->id_convenio = $entrada['id_convenio'];
        } else {
            $agendamento->id_convenio = NULL;
        }

        $data_entrada = $entrada['dia_da_consulta'] . " " . $entrada['hora_entrada'];
        $data_saida = $entrada['dia_da_consulta'] . " " . $entrada['hora_saida'];

        $agendamento->data_entrada = $data_entrada;
        $agendamento->data_saida = $data_saida;

        if(isset($entrada['recorrencia_do_agendamento'])) {
            $agendamento->recorrencia_do_agendamento = true;
            $agendamento->tipo_da_recorrencia = $entrada['tipo_da_recorrencia'];
        } else {
            $agendamento->recorrencia_do_agendamento = false;
            $agendamento->tipo_da_recorrencia = NULL;
        }

        $agendamento->status = true;
        $agendamento->save();

        return redirect()->route('profissional.agendamento.ver', $agendamento->id);

    }


}
