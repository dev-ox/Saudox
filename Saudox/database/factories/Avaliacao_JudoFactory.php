<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AvaliacaoJudo;
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

$factory->define(AvaliacaoJudo::class, function (Faker $faker) {
    return [
        'id' => 1,
        'id_paciente' => 1,
        'id_profissional' => 1,
        'diagnostico' => 4,
        'relacao_com_as_pessoas_judo' => 4,
        'resposta_emocional' => 4,
        'uso_do_corpo' => 4,
        'uso_de_objetos' => 4,
        'adaptacao_a_mudancas' => 4,
        'resposta_auditiva' => 4,
        'resposta_visual' => 4,
        'medo_ou_nervosismo' => 4,
        'comunicacao_verbal' => 4,
        'orienta_se_por_som' => 4,
        'comunicacao_nao_verbal' => 4,
        'orienta_se_por_som' => 4,
        'reacao_ao_nao' => 4,
        'compreendem_comandos_simples_palavras_que_descrevam_objetos' => 4,
        'manipula_brinquedos_objetos' => 4,
        'equilibrio' => 4,
        'forca' => 4,
        'resistencia' => 4,
        'marcha' => 4,
        'agilidade' => 4,
        'coordenacao_motora_fina' => 4,
        'coordenacao_motora_grossa' => 4,
        'propriocepcao' => 4,
        'compreende_direcoes' => 4,
        'compreende_comandos_professoras' => 4,
        'concentracao' => 4,
        'comportamento_reflexo' => 4,
        'observacoes' => 4,
        'terapias' => 4,
        'objetivos' => 4,
        'tipo_da_aula' => 4,
    ];
});
