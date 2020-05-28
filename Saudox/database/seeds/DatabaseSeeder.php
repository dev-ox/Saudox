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
      ]);
    }
}
