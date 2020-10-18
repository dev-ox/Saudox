<?php

use Illuminate\Database\Seeder;

class ConveniosAutSeeds extends Seeder {

    public function run() {
        include('database/seeds/SeedsConfig.php');

        $nome_convenio =  ['Unimed', 'SulAmérica', 'BioSaúde', 'Bradesco Saúde', 'Amil', 'Golden Cross', 'Allianz Saúde', 'Porto Seguro', 'UniHosp', 'GS Saúde', 'BioVida Saúde'];

        //Gerando convenios automaticamente
        for($i = 0; $i < sizeof($nome_convenio); $i++){
            DB::table('convenios')->insert([
                'nome_convenio' => $nome_convenio[$i],
                'numero_convenio' => rand(100,999),
            ]);
        }
    }
}
