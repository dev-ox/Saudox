<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

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

$factory->define(Profissional::class, function (Faker $faker) {
    return [
        'nome' => 'Carlos Antônio',
        'cpf' => '12345678910',
        'rg' => '12345678',
        'status' => 'Ativo',
        'login' => '12345678910',
        'password' => '123123123',
        'profissao' => 'Psicologo',
        'numero_conselho' => '123',
        'id_endereco' => 0,
        'telefone_1' => '12345678910',
        'telefone_2'=> '12345678911',
        'email' => 'carlosaajunior.jp@gmail.com',
        'estado_civil' => 'Solteiro',
        'nacionalidade' => 'Brasileiro',
    ];
});
