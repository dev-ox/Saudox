<?php
namespace App\Http\Controllers\Profissional;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Profissional;
use App\Paciente;
use Auth;

class ProfissionalAnamneseController extends Controller {


    // FONOAUDIOLOGIA
    public function verFonoaudiologia($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        $anamnese = $paciente->anamneseFonoaudiologias;
        if(!$anamnese){
            return redirect()->route('erro', ['msg_erro' => "Anamnese do paciente " .$id_paciente. " não existe"]);
        }
        return view('profissional/anamnese/fonoaudiologia/ver', ['anamnese' => $anamnese]);
    }

    public function criarFonoaudiologia($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        return view('profissional/anamnese/fonoaudiologia/criar', ['paciente' => $paciente]);
    }

    public function editarFonoaudiologia($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        $anamnese = $paciente->anamneseFonoaudiologias;
        if(!$anamnese){
            return redirect()->route('erro', ['msg_erro' => "Anamnese do paciente " .$id_paciente. " não existe"]);
        }
        return view('profissional/anamnese/fonoaudiologia/editar', ['anamnese' => $anamnese]);
    }


    // PSICOPEDAGOGIA (GIGANTE)
    public function verPsicopedagogia($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        $anamnese = $paciente->anamneseGigantePsicopedaNeuroPsicomotos();
        if(!$anamnese){
            return redirect()->route('erro', ['msg_erro' => "Anamnese do paciente " .$id_paciente. " não existe"]);
        }
        return view('profissional/anamnese/psicopedagogia/ver', ['anamnese' => $anamnese]);
    }

    public function criarPsicopedagogia($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        return view('profissional/anamnese/psicopedagogia/criar', ['paciente' => $paciente]);
    }

    public function editarPsicopedagogia($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        $anamnese = $paciente->anamneseGigantePsicopedaNeuroPsicomotos();
        if(!$anamnese){
            return redirect()->route('erro', ['msg_erro' => "Anamnese do paciente " .$id_paciente. " não existe"]);
        }
        return view('profissional/anamnese/psicopedagogia/editar', ['anamnese' => $anamnese]);
    }


    // TERAPIA OCUPACIONAL
    public function verTerapiaOcupacional($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        $anamnese = $paciente->anamneseTerapiaOcupacionals;
        if(!$anamnese){
            return redirect()->route('erro', ['msg_erro' => "Anamnese do paciente " .$id_paciente. " não existe"]);
        }
        return view('profissional/anamnese/terapia_ocupacional/ver', ['anamnese' => $anamnese]);
    }

    public function criarTerapiaOcupacional($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        return view('profissional/anamnese/terapia_ocupacional/criar', ['paciente' => $paciente]);
    }

    public function editarTerapiaOcupacional($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        $anamnese = $paciente->anamneseTerapiaOcupacionals;
        if(!$anamnese){
            return redirect()->route('erro', ['msg_erro' => "Anamnese do paciente " .$id_paciente. " não existe"]);
        }
        return view('profissional/anamnese/terapia_ocupacional/editar', ['anamnese' => $anamnese]);
    }
}
