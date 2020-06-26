<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Paciente;
use App\Anamnese_Gigante_Psicopeda_Neuro_Psicomoto_pt3;
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

$factory->define(Anamnese_Gigante_Psicopeda_Neuro_Psicomoto_pt3::class, function (Faker $faker),  {
    return [
        'id_tp' => 1,
        'tem_horarios' => 1,
        'e_lider' => 1,
        'aceita_bem_ordens' => 1,
        'faz_birras' => 1,
        'chora_com_frequencia' => 1,
        'de_que_forma_e_punido' => 'asfuoagsufgsf',
        'pratica_esportes_se_sim_quais' => '9',
        'apresenta_agressividade_apatia_ou_teimosia' => 1,
        'tem_algum_medo_se_sim_quais' => '9',
        'quais_as_brincadeiras_e_brinquedos_favoritos' => '9',
        'quem_cuidava_da_criança_ate_os_tres_anos' => '9',
        'quem_cuida_posteriormente' => '9',
        'como_a_crianca_se_comporta_sozinha' => '9',
        'como_a_crianca_se_comporta_em_familia' => '9',
        'como_a_crianca_se_comporta_com_outras_pessoas' => '9',
        'com_quem_ele_mais_gosta_de_ficar_e_por_que' => '9',
        'em_que_momento_a_crianca_encontra_a_familia' => '9',
        'que_tipos_de_perdas_ja_enfrentou_e_em_que_idade' => '9',
        'ja_houve_conflitos_familiares_e_a_crianca_presencia' => '9',
        'assiste_tv_em_demasia' => 1,
        'quais_programas_favoritos' => 'asufgsauf',
        'de_que_forma_o_pai_e_a_mae_se_relacionam_com_a_crianca' => 'asfuasufoahsufasf',
        'em_que_horario_brincam_ou_fazem_alguma_atividade_de_lazer' => '9',
        'como_se_relaciona_com_irmaos' => '9',
        'como_se_relaciona_com_colegas_e_professores' => '9',
        'apresenta_curiosidade_sexual_se_sim_quando_comecou' => '9',
        'tipos_de_perguntas_fase_sexual' => '9',
        'fase_de_masturbacao' => '9',
        'atitude_da_família' => '9',
        'se_veste_so_a_partir_de_qual_idade' => '9',
        'se_abotoa_so_a_partir_de_qual_idade' => '9',
        'fecha_roupa_so_a_partir_de_qual_idade' => '9',
        'toma_banho_so_a_partir_de_qual_idade' => '9',
        'se_penteia_so_a_partir_de_qual_idade' => '9',
        'se_amarra_so_a_partir_de_qual_idade' => '9',
        'escova_os_dentes_so_a_partir_de_qual_idade' => '9',
        'come_so_a_partir_de_qual_idade' => '9',
        'se_calca_so_a_partir_de_qual_idade' => '9',
        'roi_unhas' => 1,
        'tem_tiques_nervosos_se_sim_quais' => '9',
        'alguma_mania_repetitiva_se_sim_qual' => '9',
        'tem_movimentos_ritmicos' => 1,
        'chupa_dedo_ou_bico' => 1,
        'temObjetoComoCheirinhoOuOutroParaDormirLevarParaEscolaSeSimQual' => '9',
        'outros_habitos' => '9',
        'como_a_familia_ve_o_problema' => '9',
        'como_o_casal_age_em_funcao_da_crianca' => '9',
        'comoOsPaisSeVeemPermissivosAutoritariosEquilibradosEPorque' => 'asufgsaufasfasfasfasfsa',
        'como_sao_colocados_os_limites_para_a_crianca_no_seu_cotidiano' => 'asufgsauf',
        'situacao_economica' => '9',
        'situacao_cultural' => '9',
        'le_quais_livros_com_que_frequência' => 'asfuasufoahsufasf',
        'vai_ao_cinema_e_com_que_frequencia' => '9',
        'estimulo_cultural_se_sim_quais' => '9',
        'habitos_de_lazer' => '9',
        'constancia_de_dialogos' => '9',
        'fazem_refeicoes_juntos_se_sim_quais' => '9',
        'algum_vício_na_família_se_sim_quais' => '9',
        'estabelece_contato_visual_se_sim_em_quais_situacoes' => 'asfuasufoahsufasf',
        'imitaAlgumGestoDeEmocaoFamiliaresPessoasProximasSeSimQuais' => '9',
        'imita_algum_som_especifico_se_sim_quais' => '9',
        'mostrase_sonolento_se_sim_com_qual_frequencia' => '9',
        'quando_estimulado_consegue_relembrar_de_situacoes_vivenciadas' => 1,
        'com_que_frequencia_ignora_estimulos' => '9',
        'com_que_frequencia_manipula_brinquedos_e_objetos' => '9',
        'ansioso_no_processo_de_mudanca_de_rotina_se_sim_voce_lembra' => 'asfuasufoahsufasf',

        ];
    });
