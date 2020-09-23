<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AvaliacaoTerapiaOcupacionalsAutSeeds extends Seeder {

    public function run() {
        include('database/seeds/SeedsConfig.php');
        include_once('database/seeds/FuncoesAuxuliaresSeeds.php');

        //Gerando anamnese terapia ocupacional automaticamente
        for($i = 0; $i < $qtd_avaliacao_terapia_ocupacionals; $i++){
            DB::table('avaliacao__terapia__ocupacionals')->insert([
                'id_paciente' => rand(1,$qtd_pacientes),
                'id_profissional' => rand(1,$qtd_profissionals),
                'data_avaliacao' => Carbon::now()->format('Y-m-d H:i:s'),
                'entrevistado' => Str::random(10),
                'queixa_principal' => texto(10),
                'brincadeiras_favoritas' => Str::random(10),
                'onde_brinca' => Str::random(10),
                'com_quem_prefere_brincar' => Str::random(10),
                'o_que_faz_rir' => Str::random(10),
                'brincadeiras_evitadas' => Str::random(10),
                'brinca_sozinho_ou_precisa_de_atencao' => Str::random(10),
                'postura_crianca_quando_brinca' => Str::random(10),
                'reacao_ao_ser_frustrada_ou_raiva' => Str::random(10),
                'quem_disciplina_a_crianca' => Str::random(10),
                'como_reage_a_orientacao_dos_pais' => Str::random(10),
                'reacao_a_abracos_carinhos' => Str::random(10),
                'areas_maior_habilidade' => Str::random(10),
                'areas_maior_dificuldade' => Str::random(10),
                'hora_de_levantar' => Str::random(10),
                'hora_cafe_da_manha' => Str::random(10),
                'hora_da_escola' => Str::random(10),
                'hora_almoco' => Str::random(10),
                'hora_janta' => Str::random(10),
                'hora_dormir' => Str::random(10),
                'dorme_durante_dia' => rand(0,1) >= 0.5,
                'dorme_com_facilidade' => rand(0,1) >= 0.5,
                'sono_tranqulo' => rand(0,1) >= 0.5,
                'acorda_noite' => Str::random(10),
                'pesadelos' => rand(0,1) >= 0.5,
                'sonambulismo' => rand(0,1) >= 0.5,
                'rola_balanca_cabeca_enquanto_dorme' => rand(0,1) >= 0.5,
                'come_com_os_dedos' => rand(0,1) >= 0.5,
                'come_com_talheres' => rand(0,1) >= 0.5,
                'brinca_com_comida' => rand(0,1) >= 0.5,
                'derrama_comida' => rand(0,1) >= 0.5,
                'usa_mao_direita_para_comer' => rand(0,1) >= 0.5,
                'bebe_em_garrafa' => rand(0,1) >= 0.5,
                'usa_canudo' => rand(0,1) >= 0.5,
                'segura_copo_garrafa_com_uma_ou_duas_maos' => Str::random(10),
                'ajuda_a_colocar_a_mesa' => rand(0,1) >= 0.5,
                'tipo_alimentacao' => Str::random(10),
                'tem_bom_apetite' => rand(0,1) >= 0.5,
                'o_que_gosta_de_comer' => Str::random(10),
                'nao_gosta_de_comer' => Str::random(10),
                'houve_dificuldade_transicao_pastoso_solido' => rand(0,1) >= 0.5,
                'gosta_de_vestir_roupa' => Str::random(10),
                'veste_roupa_sozinho_quais_pecas' => Str::random(10),
                'tira_roupa_sozinho_quais_pecas' => Str::random(10),
                'abotoa' => rand(0,1) >= 0.5,
                'amarra' => rand(0,1) >= 0.5,
                'usa_fralda' => rand(0,1) >= 0.5,
                'usa_vaso_sanitario' => rand(0,1) >= 0.5,
                'lava_maos_face_corpo' => rand(0,1) >= 0.5,
                'escova_dentes' => rand(0,1) >= 0.5,
                'se_diverte_com_o_banho' => rand(0,1) >= 0.5,
                'gosta_molhar_cabeca' => rand(0,1) >= 0.5,
                'enxuga_se' => rand(0,1) >= 0.5,
                'gosta_pentear_cabelos' => rand(0,1) >= 0.5,
                'gosta_cortar_cabelos' => rand(0,1) >= 0.5,
                'gosta_cortar_unhas' => rand(0,1) >= 0.5,
                'info_extras_relevante' => texto(20),
            ]);
        }
    }
}
