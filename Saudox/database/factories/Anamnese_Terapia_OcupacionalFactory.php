<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Paciente;
use App\AnamneseTerapiaOcupacional;
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

$factory->define(AnamneseTerapiaOcupacional::class, function (Faker $faker),  {
    return [
        'id_paciente' => 0,
        'id_profissional' => 0,
        'gestacao' => '9',
        'doencas_da_mae_na_gravidez' => '9',
        'inquietacoes_da_mae_na_gravidez' => 'asfiasfsafaf',
        'parto' => '9',
        'amamentacao_natural' => '9',
        'dificuldade_ou_atraso_no_controle_do_esfincter' => '9',
        'desenvolvimento_motor_no_tempo_certo' => '9',
        'perturbacoes_no_sono' => '9',
        'habitos_especiais_ao_dormir' => '9',
        'troca_letras_ou_fonemas' => '9',
        'dificuldade_na_fala' => '9',
        'dificuldade_na_visao' => '9',
        'dificuldade_na_locomocao' => '9',
        'movimentos_estereotipados' => 1,
        'ecolalias' => 1,
        'toma_banho_sozinho' => '9',
        'escova_os_dentes_sozinho' => '9',
        'usa_o_banheiro_sozinho' => '9',
        'necessita_auxilio_para_se_vestir_ou_despir' => '9',
        'idade_da_retirada_das_fraldas' => '9',
        'atende_intervencoes_quando_esta_desobedecendo' => '9',
        'chora_facil' => '9',
        'recusa_auxílio' => '9',
        'resistencia_ao_toque' => '9',
        'crianca_estuda' => 1,
        'ja_estudou_antes_em_outra_escola' => '9',
        'motivo_transferencia_escola_se_estudou_em_outra_antes' => '9',
        'ja_repetiu_alguma_serie' => '9',
        'possui_acompanhante_terapeutico_em_sala' => '9',
        'recebe_orientacao_aos_deveres_em_casa' => '9',
        'quem_orienta_os_deveres_em_casa_se_sim_orientacao_deveres' => 'asfiasfsafaf',
        'quanto_tempo_executa_os_deveres_em_casa' => '9',
        'quais_linguas_estrangeiras_fala' => '9',
        'quais_esportes_pratica' => '9',
        'quais_intrumentos_toca' => '9',
        'outras_atividades_que_pratica' => '9',
        'faz_amigos_com_facilidade' => '9',
        'adaptase_facilmente_ao_meio' => '9',
        'companheiros_da_crianca_em_brincadeiras' => '9',
        'escolha_de_grupo' => '9',
        'distracoes_preferidas' => '9',
        'obediente' => 1,
        'dependente' => 1,
        'comunicativo' => 1,
        'agressivo' => 1,
        'cooperativo' => 1,
        'descricao_se_sim_dependente' => '9',
        'descricao_se_sim_indepedente' => '9',
        'descricao_se_sim_agressivo' => '9',
        'descricao_se_sim_cooperador' => '9',
        'tranquilo' => 1,
        'seguro' => 1,
        'ansioso' => 1,
        'emotivo' => 1,
        'alegre' => 1,
        'queixoso' => 1,
        'insonia' => 1,
        'pesadelos' => 1,
        'hipersonia' => 1,
        'dorme_sozinho' => 1,
        'dorme_no_quarto_dos_pais' => 1,
        'divide_quarto_com_alguem' => '9',
        'medidas_disciplinares_empregadas_pelos_pais' => 'asfiasfsafaf',
        'reação_do_filho_ao_ser_contrariado' => 'aspfh',
        'atitude_dos_pais_a_reacao_filho_contrareado' => 'aspfh',
        'acompanhamento_medico' => 'aspfh',
        'qual_medico_responsavel' => '9',
        'diagnostico_medico' =>'aspfhasfsafsaf',
        ];
    });
