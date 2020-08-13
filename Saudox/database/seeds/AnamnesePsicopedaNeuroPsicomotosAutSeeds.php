<?php

use Illuminate\Database\Seeder;

class AnamneseGigantePsicopedaNeuroPsicomotosAutSeeds extends Seeder
{
    public function run()
    {
      include('database/seeds/SeedsConfig.php');

      //Gerando anamnese psico neuro psicomotos automaticamente
      for($i = 0; $i < $qtd_anamnese_gigante; $i++){
        $asd = new \App\AnamneseGigantePsicopedaNeuroPsicomoto;
        $asd->save();
      }
    }
}
