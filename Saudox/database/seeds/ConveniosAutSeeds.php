<?php

use Illuminate\Database\Seeder;

class ConveniosAutSeeds extends Seeder
{
    public function run()
    {
      include('database/seeds/SeedsConfig.php');

      //Gerando convenios automaticamente
      for($i = 0; $i < $qtd_convenios; $i++){
        DB::table('convenios')->insert([
          'nome_convenio' => Str::random(10),
          'numero_convenio' => rand(100,999),
        ]);
      }
    }
}
