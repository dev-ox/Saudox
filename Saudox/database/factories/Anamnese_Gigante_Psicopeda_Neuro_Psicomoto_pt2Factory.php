<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Paciente;
use App\Anamnese_Gigante_Psicopeda_Neuro_Psicomoto_pt2;
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

$factory->define(Anamnese_Gigante_Psicopeda_Neuro_Psicomoto_pt2::class, function (Faker $faker),  {
    return [
        'id_tp' => 1,
        'teve_otite_infancia' => '9',
        'teve_adenoides_infancia' => '9',
        'teve_amigdalites_infancia' => '9',
        'teve_alergias_infancia' => '9',
        'teve_acidentes_infancia' => '9',
        'teve_convulsoes_infancia' => '9',
        'teve_febres_infancia' => '9',
        'foi_internado_se_sim_por_quanto_tempo' => '9',
        'ja_fez_cirurgia_se_sim_com_quantos_anos_e_qual_cirugia' => 'asfua',
        'quedas_e_traumatismos' => 1,
        'teve_complicacao_com_vacina_se_sim_qual' => '9',
        'audicao_e_visao' => '9',
        'usa_oculos' => 1,
        'se_usa_oculos_leva_para_escola' => 1,
        'sono_tranquilo_se_for_agitado_quando_e_qual_frequencia' => 'asfua',
        'range_dentes' => 1,
        'terror_noturno' => 1,
        'sonambulistmo' => 1,
        'enurese' => 1,
        'fala_durante_sono' => 1,
        'dorme_so_se_nao_com_quem_dorme' => 'asfua',
        'ate_quando_dormiu_com_os_pais' => '9',
        'como_foi_a_separacao_dormida_com_os_pais' => '9',
        'habitos_especiais_sono' => '9',
        'com_que_idade_sustentou_a_cabeca' => '9',
        'com_que_idade_sentou' => '9',
        'com_que_idade_engatinhou' => '9',
        'forma_de_engatinhar' => '9',
        'com_que_idade_comecou_a_andar' => '9',
        'caia_muito' => '9',
        'deixa_cair_as_coisas' => '9',
        'esbarra_muito' => '9',
        'acredita_que_apresenta_alguma_dificuldade_motora' => '9',
        'controle_vesical_bexiga' => '9',
        'controle_anal_fezes' => '9',
        'foi_difícil_tranquilo_ou_houve_algum_a_pressao_da_família' => 'asfuaasdas',
        'balbucios' => '9',
        'quando_comecou_a_falar' => '9',
        'como_os_pais_reagiram_fala' => '9',
        'apresentou_problema_na_fala_se_sim_quais' => '9',
        'compreende_ordens' => '9',
        'presenca_de_bilinguismo_em_casa' => '9',
        'como_a_crianca_se_comunica' => '9',
        'apresenta_salivacao_no_canto_da_boca' => '9',
        'idade_entrou_na_escola' => '9',
        'adaptouse_bem' => '9',
        'metodo_alfabetizacao' => '9',
        'mudou_de_escola_se_sim_em_qual_serie_e_idade' => '9',
        'escola_atual' => '9',
        'metodo_alfabetizacao_atual' => '9',
        'serie' => '9',
        'turno' => '9',
        'professor' => '9',
        'faz_as_tarefaz_sozinho_se_nao_com_quem_faz' => '9',
        'descricao_momento_licoes' => '9',
        'opniao_paterna_sobre_escola' => '9',
        'opniao_materna_sobre_tarefas' => '9',
        'fato_importante_vida_escolar' => '9',
        'queixas_frequentes' => 'asfuasufoahsufasf',
        'tem_dificuldades_para' => 'asfuasufoahsufasf',
        'conhece_tais_coisas' => '9',
        'apresenta_tiques_se_sim_quais' => '9',
        'como_pegua_o_lapis' => '9',
        'forca_da_escrita' => '9',
        'como_acha_que_surgiu_o_problema_a_que_fatores_atribuem' => 'asfuasufoahsufasf',
        'outras_questoes' => '9',
        'escolas_que_frequentou' => 'asfuaasdas',
        'repetiu_ano_se_sim_qual_e_porque' => '9',
        'humor_habitual' => '9',
        'prefere_brincar_sozinho_ou_em_grupos' => '9',
        'estranha_mudancas_de_ambiente' => '9',
        'adaptase_facilmente_ao_meio' => 1,
        ];
    });
