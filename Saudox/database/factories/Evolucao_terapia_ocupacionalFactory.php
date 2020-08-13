<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Paciente;
use App\EvolucaoTerapiaOcupacional;
use App\Profissional;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(EvolucaoTerapiaOcupacional::class, function (Faker $faker),  {
    return [
        'id_paciente' => 0,
        'id_profissional' => 0,
        'id_evolucao_anterior' => null, //rand(1,$qtd_evolucao_terapia_ocupacional),
        'data_evolucao' => Carbon::now()->format('d-m-Y H:i:s'),
        'texto' => 'asofgasufsa 324 afuogasuof',
        'obs_importante' => 'safihasofhsafhas asfugsauf',

    ];
});
