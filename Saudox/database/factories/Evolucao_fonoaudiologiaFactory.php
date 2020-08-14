<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Paciente;
use App\EvolucaoFonoaudiologia;
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

$factory->define(EvolucaoFonoaudiologia::class, function (Faker $faker),  {
    return [
        'id_paciente' => 0,
        'id_profissional' => 0,
        'id_evolucao_anterior' => null, //rand(1,$qtd_fonoaudiologia),
        'data_evolucao' => Carbon::now()->format('d-m-Y H:i:s'),
        'processo_perceptual_visualizacao' => '9',
        'melhora_processo_perceptual_visualizacao' => 1,
        'dificuldade_mantida_no_processo_perceptual_vizualizacao' => 1,
        'processo_perceptual_audibilizacao' => '9',
        'melhora_processo_perceptual_audibilizacao' => 1,
        'dificuldade_mantida_processo_perceptual_audibilizacao' => 1,
        'funcoes_basicas_linguagem_cor' => '9',
        'melhora_funcoes_basicas_linguagem_cor' => 1,
        'dificuldade_mantida_funcoes_basicas_linguagem_cor' => 1,
        'funcoes_basicas_linguagem_forma' => '9',
        'melhora_funcoes_basicas_linguagem_forma' => 1,
        'dificuldade_mantida_funcoes_basicas_linguagem_forma' => 1,
        'funcoes_basicas_linguagem_tamanho' => '9',
        'melhora_funcoes_basicas_linguagem_tamanho' => 1,
        'dificuldade_mantida_funcoes_basicas_linguagem_tamanho' => 1,
        'funcoes_basicas_linguagem_espaco' => '9',
        'melhora_funcoes_basicas_linguagem_espaco' => 1,
        'dificuldade_mantida_funcoes_basicas_linguagem_espaco' => 1,
        'funcoes_basicas_linguagem_igual_diferente' => '9',
        'melhora_funcoes_basicas_linguagem_igual_diferente' => 1,
        'dificuldade_mantida_funcoes_basicas_linguagem_igual_diferente' => 1,
        'funcoes_basicas_linguagem_esquerda_direita' => '9',
        'melhora_funcoes_basicas_linguagem_esquerda_direita' => 1,
        'dificuldade_mantida_funcoes_basicas_linguagem_esquerda_direita' => 1,
        'funcoes_basicas_linguagem_esquema_corporal' => '9',
        'melhora_funcoes_basicas_linguagem_esquema_corporal' => 1,
        'dificuldade_mantida_funcoes_basicas_linguagem_esquema_corporal' => 1,
        'funcoes_basicas_linguagem_dominancia_lateral' => '9',
        'melhora_funcoes_basicas_linguagem_dominancia_lateral' => 1,
        'dificuldade_mantida_funcoes_basicas_linguagem_dominancia_lateral' => 1,
        'resolucao_problemas' => '9',
        'melhora_resolucao_problemas' => 1,
        'dificuldade_mantida_resolucao_problemas' => 1,
        'compreensao_ordens' => '9',
        'melhora_compreensao_ordens' => 1,
        'dificuldade_mantida_compreensao_ordens' => 1,
        'memoria_imediata_auditiva' => '9',
        'melhora_memoria_imediata_auditiva' => 1,
        'dificuldade_mantida_memoria_imediata_auditiva' => 1,
        'memoria_mediativa_auditiva' => '9',
        'melhora_memoria_mediativa_auditiva' => 1,
        'dificuldade_mantida_memoria_mediativa_auditiva' => 1,
        'memoria_imediata_visual' => '9',
        'melhora_memoria_imediata_visual' => 1,
        'dificuldade_mantida_memoria_imediata_visual' => 1,
        'memoria_mediativa_visual' => '9',
        'melhora_memoria_mediativa_visual' => 1,
        'dificuldade_mantida_memoria_mediativa_visual' => 1,
        'habilidades_comunicativas' => '9',
        'melhora_habilidades_comunicativas' => 1,
        'dificuldade_mantida_habilidades_comunicativas' => 1,
        'comunicacao_oral_sintatico_semantica' => '9',
        'melhora_comunicacao_oral_sintatico_semantica' => 1,
        'dificuldade_mantida_comunicacao_oral_sintatico_semantica' => 1,
        'comunicacao_oral_articulacao' => '9',
        'melhora_comunicacao_oral_articulacao' => 1,
        'dificuldade_mantida_comunicacao_oral_articulacao' => 1,
        'comunicacao_oral_fluencia' => '9',
        'melhora_comunicacao_oral_fluencia' => 1,
        'dificuldade_mantida_comunicacao_oral_fluencia' => 1,
        'comunicacao_oral_voz' => '9',
        'melhora_comunicacao_oral_voz' => 1,
        'dificuldade_mantida_comunicacao_oral_voz' => 1,
        'linguagem' => '9',
        'melhora_linguagem' => 1,
        'dificuldade_mantida_linguagem' => 1,

    ];
});
