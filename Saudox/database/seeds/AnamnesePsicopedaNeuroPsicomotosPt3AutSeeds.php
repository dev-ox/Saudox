<?php

use Illuminate\Database\Seeder;

class AnamneseGigantePsicopedaNeuroPsicomotosPt3AutSeeds extends Seeder {

    public function run() {
        include('database/seeds/SeedsConfig.php');
        include_once('database/seeds/FuncoesAuxuliaresSeeds.php');

        //Gerando anamnese gigante parte 3 automaticamente
        for($i = 0; $i < $qtd_anamnese_gigante; $i++){
            DB::table('anamnese__pnp__pt3s')->insert([
                'id_tp' => ($i + 1),
                'tem_horarios' => rand(0,1) >= 0.5,
                'e_lider' => rand(0,1) >= 0.5,
                'aceita_bem_ordens' => rand(0,1) >= 0.5,
                'faz_birras' => rand(0,1) >= 0.5,
                'chora_com_frequencia' => rand(0,1) >= 0.5,
                'de_que_forma_e_punido' => texto(15),
                'pratica_esportes_se_sim_quais' => Str::random(10),
                'apresenta_agressividade_apatia_ou_teimosia' => rand(0,1) >= 0.5,
                'tem_algum_medo_se_sim_quais' => Str::random(10),
                'quais_as_brincadeiras_e_brinquedos_favoritos' => Str::random(10),
                'quem_cuidava_da_criança_ate_os_tres_anos' => Str::random(10),
                'quem_cuida_posteriormente' => Str::random(10),
                'como_a_crianca_se_comporta_sozinha' => Str::random(10),
                'como_a_crianca_se_comporta_em_familia' => Str::random(10),
                'como_a_crianca_se_comporta_com_outras_pessoas' => Str::random(10),
                'com_quem_ele_mais_gosta_de_ficar_e_por_que' => Str::random(10),
                'em_que_momento_a_crianca_encontra_a_familia' => Str::random(10),
                'que_tipos_de_perdas_ja_enfrentou_e_em_que_idade' => Str::random(10),
                'ja_houve_conflitos_familiares_e_a_crianca_presencia' => Str::random(10),
                'assiste_tv_em_demasia' => rand(0,1) >= 0.5,
                'quais_programas_favoritos' => texto(10),
                'de_que_forma_o_pai_e_a_mae_se_relacionam_com_a_crianca' => texto(20),
                'em_que_horario_brincam_ou_fazem_alguma_atividade_de_lazer' => Str::random(10),
                'como_se_relaciona_com_irmaos' => Str::random(10),
                'como_se_relaciona_com_colegas_e_professores' => Str::random(10),
                'apresenta_curiosidade_sexual_se_sim_quando_comecou' => Str::random(10),
                'tipos_de_perguntas_fase_sexual' => Str::random(10),
                'fase_de_masturbacao' => Str::random(10),
                'atitude_da_família' => Str::random(10),
                'se_veste_so_a_partir_de_qual_idade' => Str::random(10),
                'se_abotoa_so_a_partir_de_qual_idade' => Str::random(10),
                'fecha_roupa_so_a_partir_de_qual_idade' => Str::random(10),
                'toma_banho_so_a_partir_de_qual_idade' => Str::random(10),
                'se_penteia_so_a_partir_de_qual_idade' => Str::random(10),
                'se_amarra_so_a_partir_de_qual_idade' => Str::random(10),
                'escova_os_dentes_so_a_partir_de_qual_idade' => Str::random(10),
                'come_so_a_partir_de_qual_idade' => Str::random(10),
                'se_calca_so_a_partir_de_qual_idade' => Str::random(10),
                'roi_unhas' => rand(0,1) >= 0.5,
                'tem_tiques_nervosos_se_sim_quais' => Str::random(10),
                'alguma_mania_repetitiva_se_sim_qual' => Str::random(10),
                'tem_movimentos_ritmicos' => rand(0,1) >= 0.5,
                'chupa_dedo_ou_bico' => rand(0,1) >= 0.5,
                'temObjetoComoCheirinhoOuOutroParaDormirLevarParaEscolaSeSimQual' => Str::random(10),
                'outros_habitos' => Str::random(10),
                'como_a_familia_ve_o_problema' => Str::random(10),
                'como_o_casal_age_em_funcao_da_crianca' => Str::random(10),
                'comoOsPaisSeVeemPermissivosAutoritariosEquilibradosEPorque' => texto(30),
                'como_sao_colocados_os_limites_para_a_crianca_no_seu_cotidiano' => texto(10),
                'situacao_economica' => Str::random(10),
                'situacao_cultural' => Str::random(10),
                'le_quais_livros_com_que_frequência' => texto(20),
                'vai_ao_cinema_e_com_que_frequencia' => Str::random(10),
                'estimulo_cultural_se_sim_quais' => Str::random(10),
                'habitos_de_lazer' => Str::random(10),
                'constancia_de_dialogos' => Str::random(10),
                'fazem_refeicoes_juntos_se_sim_quais' => Str::random(10),
                'algum_vício_na_família_se_sim_quais' => Str::random(10),
                'estabelece_contato_visual_se_sim_em_quais_situacoes' => texto(20),
                'imitaAlgumGestoDeEmocaoFamiliaresPessoasProximasSeSimQuais' => Str::random(10),
                'imita_algum_som_especifico_se_sim_quais' => Str::random(10),
                'mostrase_sonolento_se_sim_com_qual_frequencia' => Str::random(10),
                'quando_estimulado_consegue_relembrar_de_situacoes_vivenciadas' => rand(0,1) >= 0.5,
                'com_que_frequencia_ignora_estimulos' => Str::random(10),
                'com_que_frequencia_manipula_brinquedos_e_objetos' => Str::random(10),
                'ansioso_no_processo_de_mudanca_de_rotina_se_sim_voce_lembra' => texto(20),
                'analise_da_entrevista' => texto(10),
                'encaminhamentos' => texto(10),
            ]);
        }
    }
}
