<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AvaliacaoFonoaudiologiasAutSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        include('database/seeds/SeedsConfig.php');

        //Gerando avaliacao de fonoaudiologias automaticamente
        for($i = 0; $i < $qtd_avaliacao_fonoaudiologias; $i++){
          DB::table('avaliacao__fonoaudiologias')->insert([
            'id_paciente' => rand(1,$qtd_pacientes),
            'id_profissional' => rand(1,$qtd_profissionals),
            'motivo_avaliacao' => Str::random(100),
            'data_avaliacao' => Carbon::now()->format('Y-m-d H:i:s'),
            'ultima_tarefa_correta_linguagem_receptiva' => (float)rand(0,10),
            'menos_total_respostas_incorretoas_linguagem_receptiva' => (float)rand(0,10),
            'linguagem_receptiva' => (float)rand(0,10),
            'ultima_tarefa_correta_linguagem_expressiva' => (float)rand(0,10),
            'menos_total_respostas_incorretoas_linguagem_expressiva' => (float)rand(0,10),
            'linguagem_expressiva' => (float)rand(0,10),
            'ultima_tarefa_correta_linguagem_global' => (float)rand(0,10),
            'menos_total_respostas_incorretoas_linguagem_global' => (float)rand(0,10),
            'linguagem_global' => (float)rand(0,10),
            'observacao_comportamento' => Str::random(100),
          ]);
        }
    }
}
