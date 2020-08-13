<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EvolucaoPsicologicasAutSeeds extends Seeder
{
    public function run()
    {
      include('database/seeds/SeedsConfig.php');
      include_once('database/seeds/FuncoesAuxuliaresSeeds.php');

      //Gerando evolução psicologicas automaticamente
      for($i = 0; $i < $qtd_evolucao_psicologicas; $i++){
        DB::table('evolucao_psicologicas')->insert([
          'id_paciente' => rand(1,$qtd_pacientes),
          'id_profissional' => rand(1,$qtd_profissionals),
          'id_evolucao_anterior' => null, //rand(1,$qtd_evolucao_psicologicas),
          'data_evolucao' => Carbon::now()->format('Y-m-d H:i:s'),
          'tipo_atendimento' => Str::random(10),
          'texto' => texto(50),
        ]);
      }
    }
}
