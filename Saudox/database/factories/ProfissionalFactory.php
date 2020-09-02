<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profissional;
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

$factory->define(Profissional::class, function (Faker $faker) {
    return [
        'nome' => 'Carlos Antônio',
        'cpf' => $faker->unique()->safeEmail,
        'rg' => $faker->unique()->safeEmail,
        'status' => 'Ativo',
        'login' => $faker->unique()->safeEmail,
        'password' => '123123123',
        'profissao' => 'Psicologo',
        'numero_conselho' => '123',
        'id_endereco' => 1,
        'telefone_1' => '12345678910',
        'telefone_2'=> '12345678911',
        'email' => 'carlosaajunior.jp@gmail.com',
        'estado_civil' => 'Solteiro',
        'nacionalidade' => 'Brasileiro',
    ];
});
