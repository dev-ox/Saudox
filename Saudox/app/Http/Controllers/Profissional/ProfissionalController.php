<?php
namespace App\Http\Controllers\Profissional;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Profissional;
use App\Paciente;
use Auth;

class ProfissionalController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function home() {
        $profissional = Profissional::find(Auth::id());
        $profissoes = $profissional->getProfissoes();

        // TODO: A ideia é de alguma forma entregar só os pacientes que se tem interesse
        $pacientes = Paciente::all();

        return view('profissional/home',
            [
                'profissoes' => $profissoes,
                'pacientes' => $pacientes
            ]);
	}


    public function verProfissional($id) {
        $profissional = Profissional::find($id);
        if($profissional){
            return view('profissional/ver_profissional', ['profissional' => $profissional]);
        } else {
            return redirect()->route('erro', ['msg_erro' => "Profissional inexistente"]);
        }
    }

    public function verPaciente($id) {
        $paciente = Profissional::find($id);
        if($paciente){
            return view('profissional/ver_paciente', ['paciente' => $paciente]);
        } else {
            return redirect()->route('erro', ['msg_erro' => "Paciente inexistente"]);
        }
    }


}
