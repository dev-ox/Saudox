<?php

use Illuminate\Database\Seeder;

class AnamnesePsicopedaNeuroPsicomotosAutSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      include('database/seeds/SeedsConfig.php');

      //Gerando anamnese psico neuro psicomotos automaticamente
      for($i = 0; $i < $qtd_anamnese_psico_neuro_psicomotos; $i++){
        DB::table('anamnese__psicopeda__neuro__psicomotos')->insert([
        ]);
      }
    }
}
