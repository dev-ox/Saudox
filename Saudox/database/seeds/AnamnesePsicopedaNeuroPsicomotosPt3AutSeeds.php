<?php

use Illuminate\Database\Seeder;

class AnamneseGigantePsicopedaNeuroPsicomotosPt3AutSeeds extends Seeder {

    public function run() {
        include('database/seeds/SeedsConfig.php');
        include_once('database/seeds/FuncoesAuxuliaresSeeds.php');


        $de_que_forma_e_punido = ['Castigo'];
        $pratica_esportes_se_sim_quais = ['Não pratica', 'Sim, futebol e vôlei', 'Sim, natação', 'Sim, ciclismo e corrida'];
        $tem_algum_medo_se_sim_quais = ['Não tem', 'Sim, do escuro', 'Sim, de barulhos', 'Sim, de fantasmas', 'Sim, do escuro, de monstros e insetos'];
        $quais_as_brincadeiras_e_brinquedos_favoritos = ['Carro elétrico e patinete', 'Patins e skate', 'Bola e barraca'];
        $quem_cuidava_da_crianca_ate_os_tres_anos = ['Mãe', 'Pai', 'Pais'];
        $quem_cuida_posteriormente = ['Mãe', 'Pai', 'Pais'];
        $como_a_crianca_se_comporta_sozinha = ['Comportamento agressivo ou violento', 'Manipulação', 'Preguiça', 'Tristeza', 'Desânimo', 'Alegria'];
        $como_a_crianca_se_comporta_em_familia = ['Comportamento agressivo ou violento', 'Manipulação', 'Preguiça', 'Tristeza', 'Desânimo', 'Alegria'];
        $como_a_crianca_se_comporta_com_outras_pessoas = ['Comportamento agressivo ou violento', 'Manipulação', 'Preguiça', 'Tristeza', 'Desânimo', 'Alegria'];
        $com_quem_ele_mais_gosta_de_ficar_e_por_que = ['Sozinho', 'Com o irmão', 'Com os colegas de escola', 'Com os pais'];
        $em_que_momento_a_crianca_encontra_a_familia = ['Ao chegar da escola', 'No final do dia'];
        $que_tipos_de_perdas_ja_enfrentou_e_em_que_idade = ['Não enfrentou'];
        $ja_houve_conflitos_familiares_e_a_crianca_presencia = ['Não houve', 'Sim, brigas de casal'];
        $quais_programas_favoritos = ['Sem preferência'];
        $de_que_forma_o_pai_e_a_mae_se_relacionam_com_a_crianca = ['Boa relação'];
        $em_que_horario_brincam_ou_fazem_alguma_atividade_de_lazer = ['Após chegada da escola', 'Antes de ir a escola'];
        $como_se_relaciona_com_irmaos = ['Boa relação', 'Brigas constantes'];
        $como_se_relaciona_com_colegas_e_professores = ['Boa relação', 'Brigas'];
        $apresenta_curiosidade_sexual_se_sim_quando_comecou = ['Não apresenta', 'Sim, ao 10 anos'];
        $tipos_de_perguntas_fase_sexual = ['Não pergunta'];
        $fase_de_masturbacao = ['Não sabe informar', 'Infância'];
        $atitude_da_familia = ['Aceitou', 'Repudiou'];
        $se_veste_so_a_partir_de_qual_idade = ['3 anos', '4 anos', '5 anos', '6 anos'];
        $se_abotoa_so_a_partir_de_qual_idade = ['3 anos', '4 anos', '5 anos', '6 anos'];
        $fecha_roupa_so_a_partir_de_qual_idade = ['3 anos', '4 anos', '5 anos', '6 anos'];
        $toma_banho_so_a_partir_de_qual_idade = ['3 anos', '4 anos', '5 anos', '6 anos'];
        $se_penteia_so_a_partir_de_qual_idade = ['3 anos', '4 anos', '5 anos', '6 anos'];
        $se_amarra_so_a_partir_de_qual_idade = ['3 anos', '4 anos', '5 anos', '6 anos'];
        $escova_os_dentes_so_a_partir_de_qual_idade = ['3 anos', '4 anos', '5 anos', '6 anos'];
        $come_so_a_partir_de_qual_idade = ['3 anos', '4 anos', '5 anos', '6 anos'];
        $se_calca_so_a_partir_de_qual_idade = ['3 anos', '4 anos', '5 anos', '6 anos'];
        $tem_tiques_nervosos_se_sim_quais = ['Não possui', 'Sim, fazer caretas', 'Sim, trincar os dentes'];
        $alguma_mania_repetitiva_se_sim_qual = ['Não possui', 'Sim, piscar os olhos rapidamente', 'Sim, falar sozinho'];
        $temObjetoComoCheirinhoOuOutroParaDormirLevarParaEscolaSeSimQual = ['Não tem', 'Sim, bola'];
        $outros_habitos = ['Não possui'];
        $como_a_familia_ve_o_problema = ['Com bons olhos', 'Não sabe informar'];
        $como_o_casal_age_em_funcao_da_crianca = ['Não sabe informar'];
        $comoOsPaisSeVeemPermissivosAutoritariosEquilibradosEPorque = ['Permissivos, deixando a criança bem a vontade', 'Autoritários, sempre no controle'];
        $como_sao_colocados_os_limites_para_a_crianca_no_seu_cotidiano = ['Sem limites'];
        $situacao_economica = ['Confortável', 'Crtítica'];
        $situacao_cultural = ['Não sabe informar'];
        $le_quais_livros_com_que_frequencia = ['Fábulas e crônicas, diariamente', 'Contos e mitos três dias na semana', 'Novelas e lendas diariamente'];
        $vai_ao_cinema_e_com_que_frequencia = ['Não vai', 'Uma vez por mês', 'Duas vezes por mês', 'Três vezes por mês'];
        $estimulo_cultural_se_sim_quais = ['Não tem', 'Exposições de arte', 'Teatro', 'Shows e cinema', 'Livros e dança'];
        $habitos_de_lazer = ['Navegação na internet', 'Ir ao shopping', 'Ir ao cinema'];
        $constancia_de_dialogos = ['Sempre que questionado'];
        $fazem_refeicoes_juntos_se_sim_quais = ['Não', 'Sim, café da manhã e almoço', 'Sim, almoço e jantar', 'Sim, todas'];
        $algum_vicio_na_familia_se_sim_quais = ['Não tem', 'Sim, depêndencia química'];
        $estabelece_contato_visual_se_sim_em_quais_situacoes = ['Não estabelece', 'Sim, o tempo todo'];
        $imitaAlgumGestoDeEmocaoFamiliaresPessoasProximasSeSimQuais = ['Não imita'];
        $imita_algum_som_especifico_se_sim_quais = ['Não imita', 'Sim, passáros'];
        $mostrase_sonolento_se_sim_com_qual_frequencia = ['Não se mostra sonolentro', 'Durante a manhã', 'Durante a tarde', 'Durante a noite'];
        $com_que_frequencia_ignora_estimulos = ['Não ignora', 'O tempo todo'];
        $com_que_frequencia_manipula_brinquedos_e_objetos = ['Não manipula', 'Sempre que está com tempo livre'];
        $ansioso_no_processo_de_mudanca_de_rotina_se_sim_voce_lembra = ['Não'];
        $analise_da_entrevista = ['Necessário exames complementares'];
        $encaminhamentos = ['Psiquiatra', 'Neurocirurgião'];

        //Gerando anamnese gigante parte 3 automaticamente
        for($i = 0; $i < $qtd_anamnese_gigante; $i++){
            DB::table('anamnese__pnp__pt3s')->insert([
                'id_tp' => ($i + 1),
                'tem_horarios' => rand(0,1) >= 0.5,
                'e_lider' => rand(0,1) >= 0.5,
                'aceita_bem_ordens' => rand(0,1) >= 0.5,
                'faz_birras' => rand(0,1) >= 0.5,
                'chora_com_frequencia' => rand(0,1) >= 0.5,
                'de_que_forma_e_punido' => $de_que_forma_e_punido[rand(0, sizeof($de_que_forma_e_punido)-1)],
                'pratica_esportes_se_sim_quais' => $pratica_esportes_se_sim_quais[rand(0, sizeof($pratica_esportes_se_sim_quais)-1)],
                'apresenta_agressividade_apatia_ou_teimosia' => rand(0,1) >= 0.5,
                'tem_algum_medo_se_sim_quais' => $tem_algum_medo_se_sim_quais[rand(0, sizeof($tem_algum_medo_se_sim_quais)-1)],
                'quais_as_brincadeiras_e_brinquedos_favoritos' => $quais_as_brincadeiras_e_brinquedos_favoritos[rand(0, sizeof($quais_as_brincadeiras_e_brinquedos_favoritos)-1)],
                'quem_cuidava_da_criança_ate_os_tres_anos' => $quem_cuidava_da_crianca_ate_os_tres_anos[rand(0, sizeof($quem_cuidava_da_crianca_ate_os_tres_anos)-1)],
                'quem_cuida_posteriormente' => $quem_cuida_posteriormente[rand(0, sizeof($quem_cuida_posteriormente)-1)],
                'como_a_crianca_se_comporta_sozinha' => $como_a_crianca_se_comporta_sozinha[rand(0, sizeof($como_a_crianca_se_comporta_sozinha)-1)],
                'como_a_crianca_se_comporta_em_familia' => $como_a_crianca_se_comporta_em_familia[rand(0, sizeof($como_a_crianca_se_comporta_em_familia)-1)],
                'como_a_crianca_se_comporta_com_outras_pessoas' => $como_a_crianca_se_comporta_com_outras_pessoas[rand(0, sizeof($como_a_crianca_se_comporta_com_outras_pessoas)-1)],
                'com_quem_ele_mais_gosta_de_ficar_e_por_que' => $com_quem_ele_mais_gosta_de_ficar_e_por_que[rand(0, sizeof($com_quem_ele_mais_gosta_de_ficar_e_por_que)-1)],
                'em_que_momento_a_crianca_encontra_a_familia' => $em_que_momento_a_crianca_encontra_a_familia[rand(0, sizeof($em_que_momento_a_crianca_encontra_a_familia)-1)],
                'que_tipos_de_perdas_ja_enfrentou_e_em_que_idade' => $que_tipos_de_perdas_ja_enfrentou_e_em_que_idade[rand(0, sizeof($que_tipos_de_perdas_ja_enfrentou_e_em_que_idade)-1)],
                'ja_houve_conflitos_familiares_e_a_crianca_presencia' => $ja_houve_conflitos_familiares_e_a_crianca_presencia[rand(0, sizeof($ja_houve_conflitos_familiares_e_a_crianca_presencia)-1)],
                'assiste_tv_em_demasia' => rand(0,1) >= 0.5,
                'quais_programas_favoritos' => $quais_programas_favoritos[rand(0, sizeof($quais_programas_favoritos)-1)],
                'de_que_forma_o_pai_e_a_mae_se_relacionam_com_a_crianca' => $de_que_forma_o_pai_e_a_mae_se_relacionam_com_a_crianca[rand(0, sizeof($de_que_forma_o_pai_e_a_mae_se_relacionam_com_a_crianca)-1)],
                'em_que_horario_brincam_ou_fazem_alguma_atividade_de_lazer' =>$em_que_horario_brincam_ou_fazem_alguma_atividade_de_lazer[rand(0, sizeof($em_que_horario_brincam_ou_fazem_alguma_atividade_de_lazer)-1)],
                'como_se_relaciona_com_irmaos' => $como_se_relaciona_com_irmaos[rand(0, sizeof($como_se_relaciona_com_irmaos)-1)],
                'como_se_relaciona_com_colegas_e_professores' => $como_se_relaciona_com_colegas_e_professores[rand(0, sizeof($como_se_relaciona_com_colegas_e_professores)-1)],
                'apresenta_curiosidade_sexual_se_sim_quando_comecou' => $apresenta_curiosidade_sexual_se_sim_quando_comecou[rand(0, sizeof($apresenta_curiosidade_sexual_se_sim_quando_comecou)-1)],
                'tipos_de_perguntas_fase_sexual' => $tipos_de_perguntas_fase_sexual[rand(0, sizeof($tipos_de_perguntas_fase_sexual)-1)],
                'fase_de_masturbacao' => $fase_de_masturbacao[rand(0, sizeof($fase_de_masturbacao)-1)],
                'atitude_da_família' =>$atitude_da_familia[rand(0, sizeof($atitude_da_familia)-1)],
                'se_veste_so_a_partir_de_qual_idade' => $se_veste_so_a_partir_de_qual_idade[rand(0, sizeof($se_veste_so_a_partir_de_qual_idade)-1)],
                'se_abotoa_so_a_partir_de_qual_idade' => $se_abotoa_so_a_partir_de_qual_idade[rand(0, sizeof($se_abotoa_so_a_partir_de_qual_idade)-1)],
                'fecha_roupa_so_a_partir_de_qual_idade' => $fecha_roupa_so_a_partir_de_qual_idade[rand(0, sizeof($fecha_roupa_so_a_partir_de_qual_idade)-1)],
                'toma_banho_so_a_partir_de_qual_idade' =>$toma_banho_so_a_partir_de_qual_idade[rand(0, sizeof($toma_banho_so_a_partir_de_qual_idade)-1)],
                'se_penteia_so_a_partir_de_qual_idade' => $se_penteia_so_a_partir_de_qual_idade[rand(0, sizeof($se_penteia_so_a_partir_de_qual_idade)-1)],
                'se_amarra_so_a_partir_de_qual_idade' => $se_amarra_so_a_partir_de_qual_idade[rand(0, sizeof($se_amarra_so_a_partir_de_qual_idade)-1)],
                'escova_os_dentes_so_a_partir_de_qual_idade' => $escova_os_dentes_so_a_partir_de_qual_idade[rand(0, sizeof($escova_os_dentes_so_a_partir_de_qual_idade)-1)],
                'come_so_a_partir_de_qual_idade' => $come_so_a_partir_de_qual_idade[rand(0, sizeof($come_so_a_partir_de_qual_idade)-1)],
                'se_calca_so_a_partir_de_qual_idade' => $se_calca_so_a_partir_de_qual_idade[rand(0, sizeof($se_calca_so_a_partir_de_qual_idade)-1)],
                'roi_unhas' => rand(0,1) >= 0.5,
                'tem_tiques_nervosos_se_sim_quais' => $tem_tiques_nervosos_se_sim_quais[rand(0, sizeof($tem_tiques_nervosos_se_sim_quais)-1)],
                'alguma_mania_repetitiva_se_sim_qual' => $alguma_mania_repetitiva_se_sim_qual[rand(0, sizeof($alguma_mania_repetitiva_se_sim_qual)-1)],
                'tem_movimentos_ritmicos' => rand(0,1) >= 0.5,
                'chupa_dedo_ou_bico' => rand(0,1) >= 0.5,
                'temObjetoComoCheirinhoOuOutroParaDormirLevarParaEscolaSeSimQual' => $temObjetoComoCheirinhoOuOutroParaDormirLevarParaEscolaSeSimQual[rand(0, sizeof($temObjetoComoCheirinhoOuOutroParaDormirLevarParaEscolaSeSimQual)-1)],
                'outros_habitos' =>$outros_habitos[rand(0, sizeof($outros_habitos)-1)],
                'como_a_familia_ve_o_problema' => $como_a_familia_ve_o_problema[rand(0, sizeof($como_a_familia_ve_o_problema)-1)],
                'como_o_casal_age_em_funcao_da_crianca' =>$como_o_casal_age_em_funcao_da_crianca[rand(0, sizeof($como_o_casal_age_em_funcao_da_crianca)-1)],
                'comoOsPaisSeVeemPermissivosAutoritariosEquilibradosEPorque' => $comoOsPaisSeVeemPermissivosAutoritariosEquilibradosEPorque[rand(0, sizeof($comoOsPaisSeVeemPermissivosAutoritariosEquilibradosEPorque)-1)],
                'como_sao_colocados_os_limites_para_a_crianca_no_seu_cotidiano' => $como_sao_colocados_os_limites_para_a_crianca_no_seu_cotidiano[rand(0, sizeof($como_sao_colocados_os_limites_para_a_crianca_no_seu_cotidiano)-1)],
                'situacao_economica' => $situacao_economica[rand(0, sizeof($situacao_economica)-1)],
                'situacao_cultural' => $situacao_cultural[rand(0, sizeof($situacao_cultural)-1)],
                'le_quais_livros_com_que_frequência' => $le_quais_livros_com_que_frequencia[rand(0, sizeof($le_quais_livros_com_que_frequencia)-1)],
                'vai_ao_cinema_e_com_que_frequencia' => $vai_ao_cinema_e_com_que_frequencia[rand(0, sizeof($vai_ao_cinema_e_com_que_frequencia)-1)],
                'estimulo_cultural_se_sim_quais' =>$estimulo_cultural_se_sim_quais[rand(0, sizeof($estimulo_cultural_se_sim_quais)-1)],
                'habitos_de_lazer' => $habitos_de_lazer[rand(0, sizeof($habitos_de_lazer)-1)],
                'constancia_de_dialogos' => $constancia_de_dialogos[rand(0, sizeof($constancia_de_dialogos)-1)],
                'fazem_refeicoes_juntos_se_sim_quais' => $fazem_refeicoes_juntos_se_sim_quais[rand(0, sizeof($fazem_refeicoes_juntos_se_sim_quais)-1)],
                'algum_vício_na_família_se_sim_quais' => $algum_vicio_na_familia_se_sim_quais[rand(0, sizeof($algum_vicio_na_familia_se_sim_quais)-1)],
                'estabelece_contato_visual_se_sim_em_quais_situacoes' => $estabelece_contato_visual_se_sim_em_quais_situacoes[rand(0, sizeof($estabelece_contato_visual_se_sim_em_quais_situacoes)-1)],
                'imitaAlgumGestoDeEmocaoFamiliaresPessoasProximasSeSimQuais' => $imitaAlgumGestoDeEmocaoFamiliaresPessoasProximasSeSimQuais[rand(0, sizeof($imitaAlgumGestoDeEmocaoFamiliaresPessoasProximasSeSimQuais)-1)],
                'imita_algum_som_especifico_se_sim_quais' => $imita_algum_som_especifico_se_sim_quais[rand(0, sizeof($imita_algum_som_especifico_se_sim_quais)-1)],
                'mostrase_sonolento_se_sim_com_qual_frequencia' => $mostrase_sonolento_se_sim_com_qual_frequencia[rand(0, sizeof($mostrase_sonolento_se_sim_com_qual_frequencia)-1)],
                'quando_estimulado_consegue_relembrar_de_situacoes_vivenciadas' => rand(0,1) >= 0.5,
                'com_que_frequencia_ignora_estimulos' => $com_que_frequencia_ignora_estimulos[rand(0, sizeof($com_que_frequencia_ignora_estimulos)-1)],
                'com_que_frequencia_manipula_brinquedos_e_objetos' => $com_que_frequencia_manipula_brinquedos_e_objetos[rand(0, sizeof($com_que_frequencia_manipula_brinquedos_e_objetos)-1)],
                'ansioso_no_processo_de_mudanca_de_rotina_se_sim_voce_lembra' => $ansioso_no_processo_de_mudanca_de_rotina_se_sim_voce_lembra[rand(0, sizeof($ansioso_no_processo_de_mudanca_de_rotina_se_sim_voce_lembra)-1)],
                'analise_da_entrevista' => $analise_da_entrevista[rand(0, sizeof($analise_da_entrevista)-1)],
                'encaminhamentos' => $encaminhamentos[rand(0, sizeof($encaminhamentos)-1)],

            ]);
        }
    }
}
