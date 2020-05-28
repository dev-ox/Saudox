<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EvolucaoTerapiaOcupacionalsAutSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      include('database/seeds/SeedsConfig.php');

      //Gerando evolução terapia ocupacional automaticamente
      for($i = 0; $i < $qtd_evolucao_terapia_ocupacional; $i++){
        DB::table('evolucao_terapia_ocupacionals')->insert([
          'id_paciente' => rand(1,$qtd_pacientes),
          'id_profissional' => rand(1,$qtd_profissionals),
          'id_evolucao_anterior' => null, //rand(1,$qtd_evolucao_terapia_ocupacional),
          'data_evolucao' => Carbon::now()->format('Y-m-d H:i:s'),
          'texto' => Str::random(1000),
          'obs_importante' => Str::random(100),
        ]);
      }
    }
}
