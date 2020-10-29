<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AvaliacaoTerapiaOcupacionalsAutSeeds extends Seeder {

    public function run() {
        include('database/seeds/SeedsConfig.php');
        include_once('database/seeds/FuncoesAuxuliaresSeeds.php');

        $entrevistado = ['Pai', 'Mãe', 'Pais', 'Irmãos', 'Avós'];
        $queixa_principal = ['Alterações cognitivas e afetivas', 'Alterações perceptivas e psico-motoras'];
        $brincadeiras_favoritas = ['Pique-bandeira', 'Pega-pega', 'Esconde-esconde', 'Pular corda', 'Futebol'];
        $onde_brinca = ['Em casa', 'Parque', 'Na rua'];
        $com_quem_prefere_brincar = ['Irmãos', 'Colegas da escola', 'Primos'];
        $o_que_faz_rir = ['Cócegas', 'Brincadeiras', 'Desenhos'];
        $brincadeiras_evitadas = ['Brinquedos com partes muito pequenas',  'Joguinhos eletrônicos em excesso'];
        $brinca_sozinho_ou_precisa_de_atencao = ['Brinca sozinho', 'Prefere brincar em grupo'];
        $postura_crianca_quando_brinca = ['Normal', 'Indiferente'];
        $reacao_ao_ser_frustrada_ou_raiva = ['Triste', 'Indiferente'];
        $quem_disciplina_a_crianca = ['Pai', 'Mãe', 'Pais', 'Irmãos', 'Avós'];
        $como_reage_a_orientacao_dos_pais = ['Obedece', 'Desobedece'];
        $reacao_a_abracos_carinhos = ['Aceitação', 'Rejeição'];
        $areas_maior_habilidade = ['Vocabulário superior ao esperado para a idade', 'Nível de leitura acima da média do grupo', 'Observação acurada', 'Disposição de liderança'];
        $areas_maior_dificuldade = ['Apresentação de alternativas, respostas e soluções para problemas simples', 'Dificuldade em decisão', 'Desinteresse por regulamentos e normas'];
        $hora_de_levantar = ['5h00', '6h00', '7h00', '8h00'];
        $hora_cafe_da_manha = ['6h00', '7h00', '8h00', '9h00'];
        $hora_da_escola = ['7h00', '8h00', '12h00', '13h00'];
        $hora_almoco = ['21h00', '22h00', '23h00', '0h00'];
        $hora_janta = ['21h00', '22h00', '23h00', '0h00'];
        $hora_dormir = ['21h00', '22h00', '23h00', '0h00'];
        $acorda_noite = ['Sim', 'Não'];
        $segura_copo_garrafa_com_uma_ou_duas_maos = ['Sim', 'Não'];
        $tipo_alimentacao = ['Frutas', 'Açucares e doces', 'Carnes e ovos', 'Leite e derivados'];
        $o_que_gosta_de_comer = ['Alimentos fast food', 'Alimentos industrializados', 'Legumes', 'Verduras', 'Frutas'];
        $nao_gosta_de_comer = ['Alimentos fast food', 'Alimentos industrializados', 'Legumes', 'Verduras', 'Frutas'];
        $gosta_de_vestir_roupa = ['Sim', 'Não'];
        $veste_roupa_sozinho_quais_pecas = ['Camisa', 'Calça', 'Short', 'Meias'];
        $tira_roupa_sozinho_quais_pecas = ['Camisa', 'Calça', 'Short', 'Meias'];
        $info_extras_relevante = ['Sem mais informações'];

        //Gerando anamnese terapia ocupacional automaticamente
        for($i = 0; $i < $qtd_avaliacao_terapia_ocupacionals; $i++){
            DB::table('avaliacao__terapia__ocupacionals')->insert([
                'id_paciente' => rand(1,$qtd_pacientes),
                'id_profissional' => rand(1,$qtd_profissionals),
                'data_avaliacao' => Carbon::now()->format('Y-m-d H:i:s'),
                'entrevistado' => $entrevistado[rand(0, sizeof($entrevistado)-1)],
                'queixa_principal' => $queixa_principal[rand(0, sizeof($queixa_principal)-1)],
                'brincadeiras_favoritas' => $brincadeiras_favoritas[rand(0, sizeof($brincadeiras_favoritas)-1)],
                'onde_brinca' => $onde_brinca[rand(0, sizeof($onde_brinca)-1)],
                'com_quem_prefere_brincar' => $com_quem_prefere_brincar[rand(0, sizeof($com_quem_prefere_brincar)-1)],
                'o_que_faz_rir' => $o_que_faz_rir[rand(0, sizeof($o_que_faz_rir)-1)],
                'brincadeiras_evitadas' => $brincadeiras_evitadas[rand(0, sizeof($brincadeiras_evitadas)-1)],
                'brinca_sozinho_ou_precisa_de_atencao' => $brinca_sozinho_ou_precisa_de_atencao[rand(0, sizeof($brinca_sozinho_ou_precisa_de_atencao)-1)],
                'postura_crianca_quando_brinca' => $postura_crianca_quando_brinca[rand(0, sizeof($postura_crianca_quando_brinca)-1)],
                'reacao_ao_ser_frustrada_ou_raiva' => $reacao_ao_ser_frustrada_ou_raiva[rand(0, sizeof($reacao_ao_ser_frustrada_ou_raiva)-1)],
                'quem_disciplina_a_crianca' => $quem_disciplina_a_crianca[rand(0, sizeof($quem_disciplina_a_crianca)-1)],
                'como_reage_a_orientacao_dos_pais' => $como_reage_a_orientacao_dos_pais[rand(0, sizeof($como_reage_a_orientacao_dos_pais)-1)],
                'reacao_a_abracos_carinhos' => $reacao_a_abracos_carinhos[rand(0, sizeof($reacao_a_abracos_carinhos)-1)],
                'areas_maior_habilidade' => $areas_maior_habilidade[rand(0, sizeof($areas_maior_habilidade)-1)],
                'areas_maior_dificuldade' => $areas_maior_dificuldade[rand(0, sizeof($areas_maior_dificuldade)-1)],
                'hora_de_levantar' => $hora_de_levantar[rand(0, sizeof($hora_de_levantar)-1)],
                'hora_cafe_da_manha' => $hora_cafe_da_manha[rand(0, sizeof($hora_cafe_da_manha)-1)],
                'hora_da_escola' => $hora_da_escola[rand(0, sizeof($hora_da_escola)-1)],
                'hora_almoco' => $hora_almoco[rand(0, sizeof($hora_almoco)-1)],
                'hora_janta' => $hora_janta[rand(0, sizeof($hora_janta)-1)],
                'hora_dormir' => $hora_dormir[rand(0, sizeof($hora_dormir)-1)],
                'dorme_durante_dia' => rand(0,1) >= 0.5,
                'dorme_com_facilidade' => rand(0,1) >= 0.5,
                'sono_tranqulo' => rand(0,1) >= 0.5,
                'acorda_noite' => $acorda_noite[rand(0, sizeof($acorda_noite)-1)],
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
                'segura_copo_garrafa_com_uma_ou_duas_maos' => $segura_copo_garrafa_com_uma_ou_duas_maos[rand(0, sizeof($segura_copo_garrafa_com_uma_ou_duas_maos)-1)],
                'ajuda_a_colocar_a_mesa' => rand(0,1) >= 0.5,
                'tipo_alimentacao' => $tipo_alimentacao[rand(0, sizeof($tipo_alimentacao)-1)],
                'tem_bom_apetite' => rand(0,1) >= 0.5,
                'o_que_gosta_de_comer' => $o_que_gosta_de_comer[rand(0, sizeof($o_que_gosta_de_comer)-1)],
                'nao_gosta_de_comer' => $nao_gosta_de_comer[rand(0, sizeof($nao_gosta_de_comer)-1)],
                'houve_dificuldade_transicao_pastoso_solido' => rand(0,1) >= 0.5,
                'gosta_de_vestir_roupa' => $gosta_de_vestir_roupa[rand(0, sizeof($gosta_de_vestir_roupa)-1)],
                'veste_roupa_sozinho_quais_pecas' => $veste_roupa_sozinho_quais_pecas[rand(0, sizeof($veste_roupa_sozinho_quais_pecas)-1)],
                'tira_roupa_sozinho_quais_pecas' => $tira_roupa_sozinho_quais_pecas[rand(0, sizeof($tira_roupa_sozinho_quais_pecas)-1)],
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
                'info_extras_relevante' => $info_extras_relevante[rand(0, sizeof($info_extras_relevante)-1)],
            ]);
        }
    }
}
