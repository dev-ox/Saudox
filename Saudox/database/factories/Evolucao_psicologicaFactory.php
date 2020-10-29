<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EvolucaoPsicologica;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

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

$factory->define(EvolucaoPsicologica::class, function (Faker $faker) {
    return [
        'id_paciente' => 0,
        'id_profissional' => 0,
        'id_evolucao_anterior' => null, //rand(1,$qtd_evolucao_psicologicas),
        'data_evolucao' => Carbon::now()->format('Y-m-d H:i:s'),
        'tipo_atendimento' => '9',
        'texto' => 'asfohasofuhsaoufhasoufhasioufhsa kfukxzgfuisagfaiufas',
    ];
});
