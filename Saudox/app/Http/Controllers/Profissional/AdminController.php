<?php
namespace App\Http\Controllers\Profissional;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Paciente;
use App\Profissional;

class AdminController extends Controller
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

	public function adminHome() {
		return view('profissional/admin/home', ['pacientes' => Paciente::all(),'profissionais' => Profissional::all()]);
	}

}
