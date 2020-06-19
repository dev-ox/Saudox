<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
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

$factory->define(Paciente::class, function (Faker $faker) {
    return [
        'login' => 'literalmentequalquercoisa',
        'password' => '123123123',
        'nome_paciente' => 'Carlos Antonio Alves Junior',
        'cpf' => '98765432110',
        'sexo' => 'Masculino',
        'data_nascimento' => '10-05-1999',
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
        'id_endereco' => 0,
        'naturalidade' => 'Brasileiro',
        'pais_sao_casados' => false,
        'pais_sao_divorciados' => false,
        'tipo_filho_biologico_adotivo' => false,
    ];
});
