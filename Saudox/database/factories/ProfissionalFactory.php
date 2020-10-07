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
        'login' => $faker->unique()->name,
        'password' => bcrypt('123123123'),
        'nome' => 'Carlos Antônio Alves',
        'cpf' => random_int(11111111111, 99999999999),
        'rg' => random_int(1111111, 9999999),
        'status' => 'Ativo',
        'profissao' => Profissional::Adm,
        'numero_conselho' => '123345',
        'id_endereco' => 1,
        'telefone_1' => '12345678910',
        'telefone_2'=> '12345678911',
        'email' => $faker->unique()->safeEmail,
        'estado_civil' => 'Solteiro',
        'nacionalidade' => 'Brasileiro',
        'descricao_de_conhecimento_e_experiencia' => 'Tem Pós em alguma área médica',
        'aviso' => 'Aviso que não estarei disponível no dia 2',
    ];
});
