<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AnamneseGigantePsicopedaNeuroPsicomotoPt1;
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

$factory->define(AnamneseGigantePsicopedaNeuroPsicomotoPt1::class, function (Faker $faker) {
    return [
        'id_tp' => 1,
        'id_paciente' => 1,
        'id_profissional' => 1,
        'compareceram_entrevista' => '9',
        'queixa' =>'aspfhasfsafsaf',
        'escolaridade' => '9',
        'turno_das_aulas' => '9',
        'horario_das_aulas' => '9',
        'escola' => '9',
        'escola_publica_privada' => 1,
        'professor_responsavel' => '9',
        'coordenador' => '9',
        'encaminhado_pela_escola' => 1,
        'profissao_pai' => '9',
        'profissao_mae' => '9',
        'escolaridade_pai' => '9',
        'escolaridade_mae' => '9',
        'relacao_dos_pais_hoje' => '9',
        'outras_crianças_e_parentes_que_moram_com_a_criança' => 'asfpi',
        'tratamento_para_infertilidade' => '9',
        'historia_familiar_de_doenca_neurologica' => '9',
        'convulcoes' => '9',
        'como_era_composta_a_familia_na_epoca_da_concepcao' => 'asfpsafsaf',
        'idade_dos_pais_na_epoca_mãe' => rand(20,80),
        'idade_dos_pais_na_epoca_pai' => rand(20,80),
        'gestacoes_anteriores' => 1,
        'abortos' => rand(0,3),
        'naturais' => rand(0,3),
        'provocados' => rand(0,3),
        'perdeu_algum_filho' => 1,
        'a_perca_foi_antes_do_paciente' => 1,
        'como_perdeu_o_filho' => '9',
        'como_foi_a_aceitacao_das_familias' => '9',
        'gravidez_planejada_por_ambos' => 1,
        'fez_tratamento_pre_natal' => 1,
        'sofreu_acidentes_quedas_se_sim_como_foi' => '9',
        'teve_alguma_doenca_na_gestacao' => '9',
        'tomou_alguma_medicacao_se_sim_qual' => '9',
        'enjoo' => 1,
        'bebeu' => 1,
        'fumou' => 1,
        'entrou_em_contato_com_algum_produto_quimicotoxico_se_sim_qual' => '9',
        'esteve_em_ambientes_com_alto_nivel_de_poluicao' => 1,
        'exposição_a_raiox' => 1,
        'qual_era_a_situacao_economica_do_casal_na_epoca' => '9',
        'ja_tinham_outros_filhos_se_sim_quantos' => '9',
        'mae_trabalhava_fora_durante_gravidez' => 1,
        'casal_ou_familia_de_ambos_possui_doenca_hereditaria_se_sim_qual' => '9',
        'local_parto' => '9',
        'tipo_parto' => '9',
        'algum_problema_no_parto_se_sim_qual' => '9',
        'peso_ao_nascer' => (float)rand(0.1,4.0),
        'comprimento_ao_nascer' => (float)rand(0.3,0.5),
        'teve_ictericia' => 1,
        'idade_gestacional_do_bebê_ao_nascer' => '9',
        'como_se_deu_a_alimentação' => 'asfpi',
        'mamou_no_seio_se_nao_qual_o_motivo' => '9',
        'se_mamou_foi_ate_quando_e_como_se_sentia_ao_amamentar' => 'asfpi',
        'tomou_mamadeira_ate_quando' => '9',
        'aceitou_bem_a_alimentação_pastosa' => 1,
        'aceitou_bem_a_alimentação_solida' => 1,
        'usa_copo' => 1,
        'alimentacao_atual' => 'asfpi',
        'retardo_diabetes_síndromes_doenças_nervosas_epilepsia' => '9',
        'teve_sarampo_infancia' => '9',
        'teve_dores_ouvido_infancia' => '9',
        'teve_colicas_infancia' => '9',
        'teve_catapora_infancia' => '9',
        'teve_caxumba_infancia' => '9',
        'teve_rubeola_infancia' => '9',
        'teve_coqueluche_infancia' => '9',
        'teve_meningite_infancia' => '9',
        'teve_desidratacao_infancia' => '9',
    ];
});
