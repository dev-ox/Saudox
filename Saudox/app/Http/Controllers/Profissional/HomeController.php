<?php

namespace App\Http\Controllers\Profissional;

use App\Agendamentos;
use App\Http\Controllers\Controller;
use App\Profissional;

class HomeController extends Controller {

    public function index(){
        return view('profissional.home');
    }


    public function recepcao_home() {

        date_default_timezone_set('America/Recife');
        $agendamentos_do_dia = Agendamentos::whereDate("data_entrada", date("Y-m-d"))
            //Agendamentos ativos apenas
            ->where('status', '1')
            //Odenados pela data de entrada
            ->orderBy('data_entrada', 'asc')
            ->get();

        //Agrupar por profissional
        //o groupBy da query não consegui fazer funcionar

        $agendamentos_agrupados_por_profissional = array();
        $profissionais = array();

        // Um array pra cada profissional
        foreach($agendamentos_do_dia as $agendamento) {
            $agendamentos_agrupados_por_profissional[$agendamento->id_profissional] = array();
            $profissionais[$agendamento->id_profissional] = Profissional::findOrFail($agendamento->id_profissional);
        }

        foreach($agendamentos_do_dia as $agendamento) {
            array_push($agendamentos_agrupados_por_profissional[$agendamento->id_profissional], $agendamento);
        }



        return view("profissional.recepcao.home", [
            "agendamentos_agrupados_por_profissional" => $agendamentos_agrupados_por_profissional,
            "profissionais" => $profissionais,
        ]);
    }






}
