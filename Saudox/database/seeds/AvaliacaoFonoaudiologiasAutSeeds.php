<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class AvaliacaoFonoaudiologiasAutSeeds extends Seeder {

    public function run() {
        include('database/seeds/SeedsConfig.php');
        include_once('database/seeds/FuncoesAuxuliaresSeeds.php');

        $motivo_avaliacao = ['Alteração na voz', 'Alteração na fala', 'Alteração na audição', 'Alteração na motricidade oral, Alterações na deglutição e linguagem'];
        $observacao_comportamento = ['Se interessa por brinquedos educativos', 'Passa minutos olhando para o horizonte', 'Desvia o olhar na hora da fala', 'Não gosta de atividades em grupo'];

        //Gerando avaliacao de fonoaudiologias automaticamente
        for($i = 0; $i < $qtd_avaliacao_fonoaudiologias; $i++){
            DB::table('avaliacao__fonoaudiologias')->insert([
                'id_paciente' => rand(1,$qtd_pacientes),
                'id_profissional' => rand(1,$qtd_profissionals),
                'motivo_avaliacao' => $motivo_avaliacao[rand(0, sizeof($motivo_avaliacao)-1)],
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
                
                'observacao_comportamento' => $observacao_comportamento[rand(0, sizeof($observacao_comportamento)-1)],
                'seletor_questionario' => 'nenhum_bloco',
                'respostas' => json_encode(array()),
            ]);
        }
    }
}
