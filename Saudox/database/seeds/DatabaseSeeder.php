<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    public function run() {
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
            EvolucaoPsicologicasAutSeeds::class,
            EvolucaoTerapiaOcupacionalsAutSeeds::class,
            EvolucaoTerapiaOcupacionalsAutSeeds::class,
            EvolucaoFonoaudiologiaAutSeeds::class,
            AnamneseGigantePsicopedaNeuroPsicomotosAutSeeds::class,
            AnamneseGigantePsicopedaNeuroPsicomotosPt1AutSeeds::class,
            AnamneseGigantePsicopedaNeuroPsicomotosPt2AutSeeds::class,
            AnamneseGigantePsicopedaNeuroPsicomotosPt3AutSeeds::class,
            AvaliacaoNeuropsicologicasAutSeeds::class,
        ]);
    }
}
