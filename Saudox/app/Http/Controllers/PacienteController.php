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

        // Ele retorna o id da avaliação [note que o id nunca será negativo]
        $id_ava_fono = $paciente->avaliacaoFono ? $paciente->avaliacaoFono['id'] : -1;
        $id_ava_judo = $paciente->avaliacaoJudo ? $paciente->avaliacaoJudo['id'] : -1;
        $id_ava_neur = $paciente->avaliacaoNeuro ? $paciente->avaliacaoNeuro['id'] : -1;
        $id_ava_tocp = $paciente->avaliacaoTerapiaOcupacional ? $paciente->avaliacaoTerapiaOcupacional['id'] : -1;

        // Ele retorna o id da anamnese [note que o id nunca será negativo]
        $id_anamnese_tocp = $paciente->anamneseTerapiaOcupacionals ? $paciente->anamneseTerapiaOcupacionals['id'] : -1;
        $id_anamnese_fono = $paciente->anamneseFonoaudiologias ? $paciente->anamneseFonoaudiologias['id'] : -1;
        $id_anamnese_pnps = $paciente->anamneseGigantePsicopedaNeuroPsicomotos() ?  $paciente->anamneseGigantePsicopedaNeuroPsicomotos()->id : -1;

        $agendamentos = Agendamentos::where('status', '1')
            ->where('cpf', $paciente->cpf)
            //Odenados pela data de entrada
            ->orderBy('data_entrada', 'asc')
            ->get();

        if($paciente){
            return view('paciente.home', [
                'paciente' => $paciente,
                'agendamentos' => $agendamentos,
                'id_ava_fono' => $id_ava_fono,
                'id_ava_judo' => $id_ava_judo,
                'id_ava_tocp' => $id_ava_tocp,
                'id_ava_neur' => $id_ava_neur,
                'id_anamnese_fono' => $id_anamnese_fono,
                'id_anamnese_pnps' => $id_anamnese_pnps,
                'id_anamnese_tocp' => $id_anamnese_tocp,
            ]);
        } else {
            return redirect()->route('erro', ['msg_erro' => "Paciente inexistente"]);
        }

    }


}
