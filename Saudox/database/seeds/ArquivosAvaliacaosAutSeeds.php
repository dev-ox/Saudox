<?php

use Illuminate\Database\Seeder;

class ArquivosAvaliacaosAutSeeds extends Seeder {

    public function run() {
        include('database/seeds/SeedsConfig.php');

        //Gerando aarquivos avaliação automaticamente
        for($i = 0; $i < $qtd_arquivo_avaliacao; $i++){
            DB::table('arquivos_avaliacaos')->insert([
                'tipo_da_avaliacao' => Str::random(100),
                'id_da_avaliacao' => rand(1,$qtd_arquivo_avaliacao),
                'arquivo' => base64_encode(file_get_contents(addslashes(dirname(__FILE__) . "/pdf_seed.pdf"))),
            ]);
        }
    }
}
