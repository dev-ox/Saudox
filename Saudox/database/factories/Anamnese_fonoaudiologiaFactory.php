<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AnamneseFonoaudiologia;
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

$factory->define(AnamneseFonoaudiologia::class, function (Faker $faker) {
    return [
        'id_paciente' => 0,
        'id_profissional' => 0,
        'responsavel_pelo_paciente' =>'Paulo Almeida',
        'numero_de_irmaos' => rand(0,5),
        'posicao_bloco_familiar' =>'Somente Alguma Coisa',
        'status_relacao_pais' => 'Boa, mas poderia melhorar',
        'reacao_crianca_status_relacao_pais' => 'Fica triste pra caramba',
        'se_pais_separados_paciente_vive_com_quem' =>'O pai',
        'crianca_desejada' => 1,
        'idade_mae' => rand(20,55),
        'idade_pai' => rand(20,65),
        'tinha_expectativa_em_relacao_ao_sexo_da_crianca' => 'Sim, havia',
        'duracao_da_gestacao' =>'9 Mêses e 2 dias',
        'fez_pre_natal' =>'Não',
        'tipo_parto' =>'Normal',
        'complicacao_durante_parto' => 'Não',
        'foi_necessario_utilizar_algum_recurso' => 'Não',
        'mae_apresentou_algum_problema_durante_gravidez' => 'Não, tudo certo',
        'amamentacao_natural' => 1,
        'atraso_ou_problema_na_fala' => 1,
        'tem_enurese_noturna' => 1,
        'desenvolvimento_motor_no_tempo_esperado' => 1,
        'perturbacoes_como_pesadelos_sonambulismo_agitacao_etc' => 1,
        'letras_ou_fonemas_trocados' => 'Sim, troca asd por qwe',
        'fatos_que_afetaram_o_desenvolvimento_do_paciente' => 'Fome por açúcar!',
        'ate_quantos_anos_usou_chupetas' =>'Até os 3 anos',
        'ja_fez_tratamento_fonoaudiologo' => 1,
        'se_sim_tratamento_fono_anterior_onde' => 'Não',
        'se_sim_tratamento_fono_anterior_quando' => 'Não',
        'dificuldades_na_fala' => 'Pouca coisa',
        'dificuldades_na_visao' => 'Pouca coisa',
        'dificuldades_na_locomocao' => 'Muita! Ele as vezes gosta de escrever um texto grande',
        'problemas_de_saude' => 'Não, só gripe mesmo',
        'toma_ou_ja_tomou_remedio_controlado_se_sim_quais' => 'Nunca tomou.',
        'toma_banho_sozinho' => 1,
        'escova_os_dentes_sozinho' => 1,
        'usa_o_banheiro_sozinho' => 1,
        'necessita_de_auxilio_para_se_vestir_ou_despir' => 1,
        'atende_as_intervencoes_quando_esta_desobedecendo' => 1,
        'chora_facil' => 1,
        'recusa_auxilio' => 1,
        'tem_resistencia_ao_toque' =>'Nenhuma',
        'serie_atual_na_escola' =>'Quinto ano',
        'alfabetizada' => 1,
        'tem_dificuldades_de_aprendizagem' => 'Sim, pois ele é danado.',
        'repetiu_algum_ano' => 1,
        'faz_amigos_com_facilidade' =>'Normalmente',
        'adapta_se_facilmente_ao_meio' =>'Não, gosta apenas de casa',
        'companheiros_da_crianca_nas_brincadeiras' => 'Meninas',
        'distracoes_preferidas' => 'Ninguém sabe, ele só dorme',
        'atitudes_sociais_predominantes' => 'Obediente',
        'comportamento_emocional' => 'Triste',
        'comportamento_sono' => 'Insônia',
        'dorme_sozinho' => 1,
        'dorme_no_quarto_dos_pais' => 1,
        'medidas_disciplinares_empregadas_pelos_pais' => 'Castigo (sem jogar Dwarf Fortress)',
        'outras_ocorrencias_observacoes' => 'Aqui eu gostaria de escrever bastante coisa, mas né... Quem danado vai fazer isso. ^^',
        'responsavel_por_este_documento' => '',
        'id_pode_ver' => '',
        'id_pode_editar' => '',
    ];
});
