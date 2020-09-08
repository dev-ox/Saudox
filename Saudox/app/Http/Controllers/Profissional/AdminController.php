<?php
namespace App\Http\Controllers\Profissional;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Paciente;
use App\Profissional;
use App\Endereco;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller {

    public function adminHome() {

        //Pegando tanto os paciente quanto profissionais que foram editados (ou criados) recentemente;
        //Pegando apenas o id, nome e cpf.

        $lista_pacientes = Paciente::select('id', 'nome_paciente', 'cpf')
            ->orderBy('updated_at', 'desc')
            ->take(50)
            ->get();

        $lista_profissionais = Profissional::where('status', Profissional::Trabalhando)
            ->select('id', 'nome', 'cpf')
            ->orderBy('updated_at', 'desc')
            ->take(50)
            ->get();


        return view('profissional/admin/home', ['pacientes' => $lista_pacientes,'profissionais' => $lista_profissionais]);
    }

    public function cadastroProfissional() {
        return view('profissional/admin/criar_profissional');
    }

    public function salvarCadastrarProfissional(Request $request) {

        $entrada = $request->all();

        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'min' => 'O campo :attribute é deve ter no minimo :min caracteres.',
            'max' => 'O campo :attribute é deve ter no máximo :max caracteres.',
            'password.required' => 'A senha é obrigatória.',
        ];

        $validator_endereco = Validator::make($entrada, Endereco::$regras_validacao, $messages);
        if ($validator_endereco->fails()) {
            return redirect()->back()
                             ->withErrors($validator_endereco)
                             ->withInput();
        }

        $validator_profissional = Validator::make($entrada, Profissional::$regras_validacao, $messages);
        if ($validator_profissional->fails()) {
            return redirect()->back()
                             ->withErrors($validator_profissional)
                             ->withInput();
        }


        $endereco = new Endereco;
        $endereco->fill($entrada);
        $endereco->save();


        $profissional = new Profissional;
        $profissional->fill($entrada);
        $profissional->id_endereco = $endereco->id;
        $profissional->status = Profissional::Trabalhando;

        $profisssoes = $entrada['profissoes'];
        $str_profissoes = "";
        foreach($profisssoes as $profissao) {
            $str_profissoes .= $profissao . ";";
        }
        $profissional->profissao = $str_profissoes;

        $profissional->save();

        return redirect()->route('profissional.ver', $profissional->id);
    }

}
