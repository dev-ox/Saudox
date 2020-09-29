<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Paciente;
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

$factory->define(Paciente::class, function (Faker $faker) {
    return [
        'login' => $faker->unique()->safeEmail,
        'password' => '123123123',
        'nome_paciente' => 'Carlos Antonio Alves Junior',
        'cpf' => $faker->unique()->company,
        'sexo' => 1,
        'data_nascimento' => Carbon::now()->format('Y-m-d H:i:s'),
        'responsavel' => 'Maria Sueli',
        'numero_irmaos' => 1,
        'lista_irmaos' => 'Barbara Yorrana',
        'nome_pai' => 'Tenho Pai Nao',
        'nome_mae' => 'Maria Sueli de Melo',
        'telefone_pai' => '66666666666',
        'telefone_mae' => '11111111111',
        'email_pai' => 'satanas@inferno.com',
        'email_mae' => 'emailteste@gmail.com',
        'idade_pai' => 99,
        'idade_mae' => 45,
        'id_endereco' => 1,
        'naturalidade' => 'Brasileiro',
        'pais_sao_casados' => 1,
        'pais_sao_divorciados' => 0,
        'tipo_filho_biologico_adotivo' => 1,
    ];
});
