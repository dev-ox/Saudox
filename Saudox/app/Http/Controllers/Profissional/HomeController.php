<?php

namespace App\Http\Controllers\Profissional;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller {

	public function index(){
		return view('profissional.home');
	}

}
