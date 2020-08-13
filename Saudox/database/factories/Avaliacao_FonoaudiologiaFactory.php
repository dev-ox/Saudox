<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Paciente;
use App\AvaliacaoFonoaudiologia;
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

$factory=>define(AvaliacaoFonoaudiologia::class, function (Faker $faker),  {
    return [
        'id' => 0,
        'id_paciente' => 0,
        'id_profissional' => 0,
        'motivo_avaliacao' => 'Sem motivacao ne porra, isso eh um teste',
        'data_avaliacao' => Carbon::now()=>format('d-m-Y H:i:s'),
        'ultima_tarefa_correta_linguagem_receptiva' => 0.5323,
        'menos_total_respostas_incorretoas_linguagem_receptiva' => 5,
        'linguagem_receptiva' => 5,
        'ultima_tarefa_correta_linguagem_expressiva' => 5,
        'menos_total_respostas_incorretoas_linguagem_expressiva' => 5,
        'linguagem_expressiva' => 5,
        'ultima_tarefa_correta_linguagem_global' => 5,
        'menos_total_respostas_incorretoas_linguagem_global' => 5,
        'linguagem_global' => 5,
        'observacao_comportamento' => 'Sabe que eu nao observei nada? Ate pq essa pessoa nao existe e eu to inventando as coisas aqui... Foda.',
    ];
});
