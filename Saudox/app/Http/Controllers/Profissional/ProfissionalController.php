<?php
namespace App\Http\Controllers\Profissional;

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

}
