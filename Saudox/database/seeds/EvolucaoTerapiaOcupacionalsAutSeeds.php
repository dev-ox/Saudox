<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EvolucaoTerapiaOcupacionalsAutSeeds extends Seeder
{
    public function run()
    {
      include('database/seeds/SeedsConfig.php');
      include_once('database/seeds/FuncoesAuxuliaresSeeds.php');

      //Gerando evolução terapia ocupacional automaticamente
      for($i = 0; $i < $qtd_evolucao_terapia_ocupacional; $i++){
        DB::table('evolucao_terapia_ocupacionals')->insert([
          'id_paciente' => rand(1,$qtd_pacientes),
          'id_profissional' => rand(1,$qtd_profissionals),
          'id_evolucao_anterior' => null, //rand(1,$qtd_evolucao_terapia_ocupacional),
          'data_evolucao' => Carbon::now()->format('Y-m-d H:i:s'),
          'texto' => texto(50),
          'obs_importante' => texto(15),
        ]);
      }
    }
}
