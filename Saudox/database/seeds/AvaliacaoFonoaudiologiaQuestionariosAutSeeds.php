<?php

use Illuminate\Database\Seeder;

class AvaliacaoFonoaudiologiaQuestionariosAutSeeds extends Seeder {

    public function run() {
        include('database/seeds/SeedsConfig.php');

        //Gerando avaliacao de fonoaudiologias questionario automaticamente
        for($i = 0; $i < $qtd_avaliacao_fonoaudiologias_questionario; $i++){
            DB::table('avaliacao_de_fonoaudiologia_questionarios')->insert([
                'ava_fono' => rand(1,$qtd_avaliacao_fonoaudiologias),
                'respostas_questionario' => Str::random(1000),
                'idade_referente_respostas_questionario' => Str::random(10),
            ]);
        }
    }
}
