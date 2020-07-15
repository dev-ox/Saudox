<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Paciente;
use App\Anamnese_fonoaudiologia;
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

$factory->define(Anamnse_fonoaudiologia::class, function (Faker $faker),  {
    return [
        'id_paciente' => 0,
        'id_profissional' => 0,
        'responsavel_pelo_paciente' =>'saifhsaifhsaoifhasiof',
        'numero_de_irmaos' => rand(0,10),
        'posicao_bloco_familiar' =>'saifhsaifhsaoifhasiof',
        'status_relacao_pais' => 'saidf',
        'reacao_crianca_status_relacao_pais' => 'saidf',
        'se_pais_separados_paciente_vive_com_quem' =>'saifhsaifhsaoifhasiof',
        'crianca_desejada' => 1 ,
        'idade_mae' => rand(20,100),
        'idade_pai' => rand(20,100),
        'tinha_expectativa_em_relacao_ao_sexo_da_crianca' => 'saidf',
        'duracao_da_gestacao' =>'saifhsaifhsaoifhasiof',
        'fez_pre_natal' =>'saifhsaifhsaoifhasiof',
        'tipo_parto' =>'saifhsaifhsaoifhasiof',
        'complicacao_durante_parto' => 'saidf',
        'foi_necessario_utilizar_algum_recurso' => 'na',
        'mae_apresentou_algum_problema_durante_gravidez' => 'saidf',
        'amamentacao_natural' => 1 ,
        'atraso_ou_problema_na_fala' => 1 ,
        'tem_enurese_noturna' => 1 ,
        'desenvolvimento_motor_no_tempo_esperado' => 1 ,
        'perturbacoes_como_pesadelos_sonambulismo_agitacao_etc' => 1 ,
        'letras_ou_fonemas_trocados' => 'na',
        'fatos_que_afetaram_o_desenvolvimento_do_paciente' => 'saidf',
        'ate_quantos_anos_usou_chupetas' =>'saifhsaifhsaoifhasiof',
        'ja_fez_tratamento_fonoaudiologo' => 1 ,
        'se_sim_tratamento_fono_anterior_onde' => 'na',
        'se_sim_tratamento_fono_anterior_quando' => 'na',
        'dificuldades_na_fala' => 'asfasfsafsd',
        'dificuldades_na_visao' => 'asfasfsafsd',
        'dificuldades_na_locomocao' => 'asfasfsafsd',
        'problemas_de_saude' => 'asfasfsafsd',
        'toma_ou_ja_tomou_remedio_controlado_se_sim_quais' => 'na',
        'toma_banho_sozinho' => 1 ,
        'escova_os_dentes_sozinho' => 1 ,
        'usa_o_banheiro_sozinho' => 1 ,
        'necessita_de_auxilio_para_se_vestir_ou_despir' => 1 ,
        'atende_as_intervencoes_quando_esta_desobedecendo' => 1 ,
        'chora_facil' => 1 ,
        'recusa_auxilio' => 1 ,
        'tem_resistencia_ao_toque' =>'saifhsaifhsaoifhasiof',
        'serie_atual_na_escola' =>'saifhsaifhsaoifhasiof',
        'alfabetizada' => 1 ,
        'tem_dificuldades_de_aprendizagem' => 'saidf',
        'repetiu_algum_ano' => 1 ,
        'faz_amigos_com_facilidade' =>'saifhsaifhsaoifhasiof',
        'adapta_se_facilmente_ao_meio' =>'saifhsaifhsaoifhasiof',
        'companheiros_da_crianca_nas_brincadeiras' => 'na',
        'distracoes_preferidas' => 'na',
        'atitudes_sociais_predominantes' => 'na',
        'comportamento_emocional' => 'na',
        'comportamento_sono' => 'na',
        'dorme_sozinho' => 1 ,
        'dorme_no_quarto_dos_pais' => 1 ,
        'medidas_disciplinares_empregadas_pelos_pais' => 'asfasfsafsd',
        'outras_ocorrencias_observacoes' => 'asfaosgfoausgfsau',
    ];
});
