<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Agendamentos;
use Illuminate\Support\Carbon;
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

$factory->define(Agendamentos::class, function (Faker $faker) {
    return [
        'id_profissional' => '1',
        'nome' => "$faker->name . silva santos",
        'cpf' => "12312312312",
        'data_nascimento_paciente' => date('d-m-Y'),
        'telefone' => "87996811674",
        'email' => "Qp0zNP5fIx@yandex.com",
        'id_endereco' => 1,
        'data_entrada' => Carbon::now(),
        'data_saida' => Carbon::now(),
        'local_de_atendimento' => 'laaaa longe',
        'recorrencia_do_agendamento' => 0,
        'tipo_da_recorrencia' => "negocin",
        'observacoes' => 'observado',
        'status' => true,

    ];
});
