<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Agendamentos;
use App\Paciente;
use Auth;

class PacienteController extends Controller {

    // Uma forma de forçar que o uso da classe passe pelo middlware (garantia)
    public function __construct(){
        $this->middleware('auth');
    }

    // Redireciona para a home do profissional
    public function home(){
        $paciente = Paciente::find(Auth::id());

        $ava_fono = $paciente->avaliacao_fono;
        $ava_judo = $paciente->avaliacao_judo;
        $ava_neur = $paciente->avaliacao_neuro;
        $ava_tocp = $paciente->avaliacao_terapia_ocupacional;

        $anamnese_fono = $paciente->anamnese__terapia__ocupacionals;
        $anamnese_pnps = $paciente->anamneseFonoaudiologias;
        $anamnese_tocp = $paciente->anamneseGigantePsicopedaNeuroPsicomotos();

        $agendamentos = Agendamentos::where('status', '1')
            ->where('cpf', $paciente->cpf)
            //Odenados pela data de entrada
            ->orderBy('data_entrada', 'asc')
            ->get();

        if($paciente){
            return view('paciente.home', [
                'paciente' => $paciente,
                'agendamentos' => $agendamentos,
                'ava_fono' => $ava_fono,
                'ava_judo' => $ava_judo,
                'ava_neur' => $ava_neur,
                'ava_tocp' => $ava_tocp,
                'anamnese_fono' => $anamnese_fono,
                'anamnese_pnps' => $anamnese_pnps,
                'anamnese_tocp' => $anamnese_tocp,
            ]);
        } else {
            return redirect()->route('erro', ['msg_erro' => "Paciente inexistente"]);
        }

    }


}
