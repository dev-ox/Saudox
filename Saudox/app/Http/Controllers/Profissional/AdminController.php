<?php
namespace App\Http\Controllers\Profissional;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Paciente;
use App\Profissional;

class AdminController extends Controller {

	public function adminHome() {
		return view('profissional/admin/home', ['pacientes' => Paciente::all(),'profissionais' => Profissional::all()]);
	}

}
