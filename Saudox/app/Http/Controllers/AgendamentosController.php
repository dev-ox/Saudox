<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


use App\Endereco;
use App\Paciente;
use App\Convenios;
use App\Profissional;
use App\Agendamentos;

class AgendamentosController extends Controller {

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

    public function salvarAgendar(Request $request) {

        $prof_logado = Profissional::find(Auth::id());
        if(!$prof_logado->podeCriarAgendamento()) {
            return view('erro', ['msg_erro' => "Você não tem permissão para manipular agendamentos!"]);
        }

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


        if($entrada['id_paciente'] != "-1") {
            $endereco = Paciente::find($entrada['id_paciente'])->endereco;
        } else {
            $endereco = new Endereco;
        }

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

        return redirect()->route('agendamento.ver', $agendamento->id);
    }

    public function verAgendamento($id_agendamento) {
        $agendamento = Agendamentos::find($id_agendamento);

        if($agendamento) {
            return view('profissional/ver_agendamento', ['agendamento' => $agendamento]);
        } else {
            return view('erro', ['msg_erro' => "Agendamento inexistente"]);
        }
    }

    public function marcarAgendamentoConcluido($id_agendamento) {
        $agendamento = Agendamentos::find($id_agendamento);

        $prof_logado = Profissional::find(Auth::id());
        if(!$prof_logado->podeCriarAgendamento() ||
            $agendamento->id_profissional != $prof_logado->id {

            return view('erro', ['msg_erro' => "Você não tem permissão para realizar essa ação!"]);
        }


        $agendamento->status = false;
        $agendamento->save();

        if($agendamento) {
            return view('profissional/ver_agendamento', ['agendamento' => $agendamento]);
        } else {
            return view('erro', ['msg_erro' => "Agendamento inexistente"]);
        }
    }

    public function editarAgendamento($id_agendamento) {
        $prof_logado = Profissional::find(Auth::id());
        if(!$prof_logado->podeCriarAgendamento()) {
            return view('erro', ['msg_erro' => "Você não tem permissão para manipular agendamentos!"]);
        }

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

    public function salvarEditarAgendar(Request $request) {

        $prof_logado = Profissional::find(Auth::id());
        if(!$prof_logado->podeCriarAgendamento()) {
            return view('erro', ['msg_erro' => "Você não tem permissão para manipular agendamentos!"]);
        }


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

        return redirect()->route('agendamento.ver', $agendamento->id);
    }


}
