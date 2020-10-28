<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AvaliacaoFonoaudiologiasAutSeeds extends Seeder {

    public function run() {
        include('database/seeds/SeedsConfig.php');
        include_once('database/seeds/FuncoesAuxuliaresSeeds.php');

        //Gerando avaliacao de fonoaudiologias automaticamente
        for($i = 0; $i < $qtd_avaliacao_fonoaudiologias; $i++){
            DB::table('avaliacao__fonoaudiologias')->insert([
                'id_paciente' => rand(1,$qtd_pacientes),
                'id_profissional' => rand(1,$qtd_profissionals),
                'motivo_avaliacao' => texto(15),
                'data_avaliacao' => Carbon::now()->format('Y-m-d H:i:s'),
                'ultima_tarefa_correta_linguagem_receptiva' => (float)rand(0,10),
                'menos_total_respostas_incorretoas_linguagem_receptiva' => (float)rand(0,10),
                'linguagem_receptiva' => (float)rand(0,10),
                'ultima_tarefa_correta_linguagem_expressiva' => (float)rand(0,10),
                'menos_total_respostas_incorretoas_linguagem_expressiva' => (float)rand(0,10),
                'linguagem_expressiva' => (float)rand(0,10),
                'escore_padrao_linguagem_receptiva' => (float)rand(0,10),
                'mais_escore_padrao_linguagem_expressiva' => (float)rand(0,10),
                'total_linguagem_global' => (float)rand(0,10),
                'escore_padrao_linguagem_global' => (float)rand(0,10),
                
                'observacao_comportamento' => texto(15),
                'seletor_questionario' => 'nenhum_bloco',
                'respostas' => json_encode(array()),

            ]);
        }
    }
}
