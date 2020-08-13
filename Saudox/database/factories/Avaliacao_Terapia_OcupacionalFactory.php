<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Paciente;
use App\AvaliacaoTerapiaOcupacional;
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

$factory->define(AvaliacaoTerapiaOcupacional::class, function (Faker $faker),  {
    return [
        'id_paciente' => 0,
        'id_profissional' => 0,
        'data_avaliacao' => Carbon::now()->format('d-m-Y H:i:s'),
        'entrevistado' => 'asfasiohfoiashfsaiofh',
        'queixa_principal' => 'safhasoufhasofa',
        'brincadeiras_favoritas' => 'safhasoufhasofa',
        'onde_brinca' => 'safhasoufhasofa',
        'com_quem_prefere_brincar' => 'safhasoufhasofa',
        'o_que_faz_rir' => 'safhasoufhasofa',
        'brincadeiras_evitadas' => 'safhasoufhasofa',
        'brinca_sozinho_ou_precisa_de_atencao' => 'safhasoufhasofa',
        'postura_crianca_quando_brinca' => 'safhasoufhasofa',
        'reacao_ao_ser_frustrada_ou_raiva' => 'safhasoufhasofa',
        'quem_disciplina_a_crianca' => 'safhasoufhasofa',
        'como_reage_a_orientacao_dos_pais' => 'safhasoufhasofa',
        'reacao_a_abracos_carinhos' => 'safhasoufhasofa',
        'areas_maior_habilidade' => 'safhasoufhasofa',
        'areas_maior_dificuldade' => 'safhasoufhasofa',
        'hora_de_levantar' => 'safhasoufhasofa',
        'hora_cafe_da_manha' => 'safhasoufhasofa',
        'hora_da_escola' => 'safhasoufhasofa',
        'hora_almoco' => 'safhasoufhasofa',
        'hora_janta' => 'safhasoufhasofa',
        'hora_dormir' => 'safhasoufhasofa',
        'dorme_durante_dia' => 1,
        'dorme_com_facilidade' => 1,
        'sono_tranqulo' => 1,
        'acorda_noite' => 'safhasoufhasofa',
        'pesadelos' => 1,
        'sonambulismo' => 1,
        'rola_balanca_cabeca_enquanto_dorme' => 1,
        'come_com_os_dedos' => 1,
        'come_com_talheres' => 1,
        'brinca_com_comida' => 1,
        'derrama_comida' => 1,
        'usa_mao_direita_para_comer' => 1,
        'bebe_em_garrafa' => 1,
        'usa_canudo' => 1,
        'segura_copo_garrafa_com_uma_ou_duas_maos' => 'safhasoufhasofa',
        'ajuda_a_colocar_a_mesa' => 1,
        'tipo_alimentacao' => 'safhasoufhasofa',
        'tem_bom_apetite' => 1,
        'o_que_gosta_de_comer' => 'safhasoufhasofa',
        'nao_gosta_de_comer' => 'safhasoufhasofa',
        'houve_dificuldade_transicao_pastoso_solido' => 1,
        'gosta_de_vestir_roupa' => 'safhasoufhasofa',
        'veste_roupa_sozinho_quais_pecas' => 'safhasoufhasofa',
        'tira_roupa_sozinho_quais_pecas' => 'safhasoufhasofa',
        'abotoa' => 1,
        'amarra' => 1,
        'usa_fralda' => 1,
        'usa_vaso_sanitario' => 1,
        'lava_maos_face_corpo' => 1,
        'escova_dentes' => 1,
        'se_diverte_com_o_banho' => 1,
        'gosta_molhar_cabeca' => 1,
        'enxuga_se' => 1,
        'gosta_pentear_cabelos' => 1,
        'gosta_cortar_cabelos' => 1,
        'gosta_cortar_unhas' => 1,
        'info_extras_relevante' => 'asofugasoufgsafgasçiufgasuifgasuifgasuf',
    ];
});
