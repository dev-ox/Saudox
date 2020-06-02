<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EvolucaoJudoAutSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      include('database/seeds/SeedsConfig.php');

      //Gerando evolução judo automaticamente
      for($i = 0; $i < $qtd_evolucao_judo; $i++){
        DB::table('evolucao_judos')->insert([
          'id_paciente' => rand(1,$qtd_pacientes),
          'id_profissional' => rand(1,$qtd_profissionals),
          'id_evolucao_anterior' => null, //rand(1,$qtd_evolucao_judo),
          'data_evolucao' => Carbon::now()->format('Y-m-d H:i:s'),
          'descricao_evolucao' => Str::random(1000),
          'carimbo' => base64_encode(file_get_contents(addslashes("https://core.ac.uk/download/pdf/71362264.pdf"))),
        ]);
      }
    }
}