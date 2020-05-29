<?php

use Illuminate\Database\Seeder;

class AnamnesePsicopedaNeuroPsicomotosAutSeeds extends Seeder
{
    public function run()
    {
      include('database/seeds/SeedsConfig.php');

      //Gerando anamnese psico neuro psicomotos automaticamente
      for($i = 0; $i < $qtd_anamnese_gigante; $i++){
        $asd = new \App\Anamnese_Psicopeda_Neuro_Psicomoto;
        $asd->save();
      }
    }
}
