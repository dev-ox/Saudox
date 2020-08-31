<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Endereco;
use Faker\Generator as Faker;

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

$factory->define(Endereco::class, function (Faker $faker) {
    return [
        'estado' => 'MG',
        'cidade' => 'Joao Pinheiro',
        'ponto_referencia' => 'Favela',
    ];
});
