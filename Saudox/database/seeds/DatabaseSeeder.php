<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call([
        EnderecosAutSeeder::class,
        ProfissionaisAutSeeds::class,
        PacientesAutSeeder::class,
        AvaliacaoJudosAutSeeds::class,
        AvaliacaoFonoaudiologiasAutSeeds::class,
        AnamneseTerapiaOcupacionalsAutSeeds::class,
        AvaliacaoTerapiaOcupacionalsAutSeeds::class,
        ArquivosAvaliacaosAutSeeds::class,
        ConveniosAutSeeds::class,
        AgendamentosAutSeeds::class,
        AnamneseFonoaudiologiasAutSeeds::class,
        AvaliacaoFonoaudiologiaQuestionariosAutSeeds::class,
        EvolucaoPsicologicasAutSeeds::class,
        EvolucaoTerapiaOcupacionalsAutSeeds::class,
        EvolucaoTerapiaOcupacionalsAutSeeds::class,
        EvolucaoFonoaudiologiaAutSeeds::class,
        AnamnesePsicopedaNeuroPsicomotosAutSeeds::class,
      ]);
    }
}
