<?php

use Illuminate\Database\Seeder;

class AnamneseGigantePsicopedaNeuroPsicomotosPt2AutSeeds extends Seeder {

    public function run() {
        include('database/seeds/SeedsConfig.php');
        include_once('database/seeds/FuncoesAuxuliaresSeeds.php');


        $teve_otite_infancia = ['Sim', 'Não'];
        $teve_adenoides_infancia = ['Sim', 'Não'];
        $teve_amigdalites_infancia = ['Sim', 'Não'];
        $teve_alergias_infancia = ['Sim', 'Não'];
        $teve_acidentes_infancia = ['Sim', 'Não'];
        $teve_convulsoes_infancia = ['Sim', 'Não'];
        $teve_febres_infancia = ['Sim', 'Não'];
        $foi_internado_se_sim_por_quanto_tempo = ['Não', 'Sim, um mês', 'Sim, três meses', 'Sim, um ano'];
        $ja_fez_cirurgia_se_sim_com_quantos_anos_e_qual_cirugia = ['Não fez'];
        $teve_complicacao_com_vacina_se_sim_qual = ['Não teve', 'Sim, convulsões febris', 'Sim, reação alérgica'];
        $audicao_e_visao = ['Funcionando perfeitamente'];
        $sono_tranquilo_se_for_agitado_quando_e_qual_frequencia = ['Tranquilo', 'Agitado, pelo menos duas vezes na semana'];
        $dorme_so_se_nao_com_quem_dorme = ['Dorme sozinho'];
        $ate_quando_dormiu_com_os_pais = ['Sempre dormiu sozinho', 'Até um ano', 'Até os dois anos'];
        $como_foi_a_separacao_dormida_com_os_pais = ['Normal'];
        $habitos_especiais_sono = ['Não possui'];
        $com_que_idade_sustentou_a_cabeca = ['3 meses', '4 meses'];
        $com_que_idade_sentou = ['4 meses', '5 meses', '6 meses'];
        $com_que_idade_engatinhou = ['7 meses', '8 meses', '9 meses'];
        $forma_de_engatinhar = ['Mãos e joelhos cruzados', 'Engatinhar com a barriga', 'Rolando'];
        $com_que_idade_comecou_a_andar = ['Um ano', 'Um ano e dois meses', 'Um anos e quatro meses'];
        $caia_muito = ['Sim', 'Não'];
        $deixa_cair_as_coisas = ['Sim', 'Não'];
        $esbarra_muito = ['Sim', 'Não'];
        $acredita_que_apresenta_alguma_dificuldade_motora = ['Sim', 'Não'];
        $controle_vesical_bexiga = ['Sim', 'Não'];
        $controle_anal_fezes = ['Sim', 'Não'];
        $foi_dificil_tranquilo_ou_houve_algum_a_pressao_da_familia = ['Tranquilo', 'Difícil'];
        $balbucios = ['Normal'];
        $quando_comecou_a_falar = ['Um ano', 'Um ano e dois meses', 'Um anos e quatro meses'];
        $como_os_pais_reagiram_fala = ['Normalidade', 'Surpresa', 'Felicidade'];
        $apresentou_problema_na_fala_se_sim_quais = ['Não apresentou'];
        $compreende_ordens = ['Sim', 'Não'];
        $presenca_de_bilinguismo_em_casa = ['Sim', 'Não'];
        $como_a_crianca_se_comunica = ['Fala', 'Fala e gestos'];
        $apresenta_salivacao_no_canto_da_boca = ['Sim', 'Não'];
        $idade_entrou_na_escola = ['4 anos', '5 anos', '6 anos'];
        $adaptouse_bem = ['Sim', 'Não'];
        $metodo_alfabetizacao = ['Métodos sintéticos', 'Métodos analíticos'];
        $mudou_de_escola_se_sim_em_qual_serie_e_idade = [''];
        $escola_atual = ['Educandário Santa Isabel', 'Educandário Saber Crescer', 'Escola de Aplicação Professora Ivonita Alves Guerra', 'Educandário Cecília Meireles', 'Escola Simôa Gomes', 'Educandário Santo André'];
        $metodo_alfabetizacao_atual = ['Método sintético', 'Método analíticos'];
        $professor = ['Maria Ferreira', 'Ana da Silva', 'Joana Félix', 'Eliza Andrade'];
        $faz_as_tarefaz_sozinho_se_nao_com_quem_faz = ['Sim', 'Não, com o pai', 'Não, com o irmão'];
        $descricao_momento_licoes = ['Sem descrição'];
        $opniao_dos_pais_sobre_escola = ['Excelente', 'Boa', 'Ruim', 'Péssima'];
        $opniao_dos_pais_sobre_tarefas = ['Fáceis', 'Difíceis'];
        $fato_importante_vida_escolar = ['Não há'];
        $queixas_frequentes = ['Não há'];
        $tem_dificuldades_para = ['Expressar sentimentos'];
        $conhece_tais_coisas = ['Não soube informar'];
        $apresenta_tiques_se_sim_quais = ['Tique motor', 'Tique verbal'];
        $como_pegua_o_lapis = ['Três dedos'];
        $forca_da_escrita = ['Forte', 'Leve'];
        $como_acha_que_surgiu_o_problema_a_que_fatores_atribuem = ['Sem ideia'];
        $outras_questoes = ['Sem outras questões'];
        $escolas_que_frequentou = ['Educandário Santa Isabel', 'Educandário Saber Crescer', 'Escola de Aplicação Professora Ivonita Alves Guerra', 'Educandário Cecília Meireles', 'Escola Simôa Gomes', 'Educandário Santo André'];
        $repetiu_ano_se_sim_qual_e_porque = ['Nunca repetiu', 'Repetiu a 3ª série pela mudança de endereço'];
        $humor_habitual = ['Disfórico', 'Elevado', 'Eutímico', 'Expansivo', 'Irritável'];
        $prefere_brincar_sozinho_ou_em_grupos = ['Sozinho', 'Em grupos'];
        $estranha_mudancas_de_ambiente = ['Sim', 'Não'];

        //Gerando anamnese gigante parte 2 automaticamente
        for($i = 0; $i < $qtd_anamnese_gigante; $i++){
            DB::table('anamnese__pnp__pt2s')->insert([
                'id_tp' => ($i + 1),
                'teve_otite_infancia' => $teve_otite_infancia[rand(0, sizeof($teve_otite_infancia)-1)],
                'teve_adenoides_infancia' => $teve_adenoides_infancia[rand(0, sizeof($teve_adenoides_infancia)-1)],
                'teve_amigdalites_infancia' => $teve_amigdalites_infancia[rand(0, sizeof($teve_amigdalites_infancia)-1)],
                'teve_alergias_infancia' => $teve_alergias_infancia[rand(0, sizeof($teve_alergias_infancia)-1)],
                'teve_acidentes_infancia' => $teve_acidentes_infancia[rand(0, sizeof($teve_acidentes_infancia)-1)],
                'teve_convulsoes_infancia' => $teve_convulsoes_infancia[rand(0, sizeof($teve_convulsoes_infancia)-1)],
                'teve_febres_infancia' => $teve_febres_infancia[rand(0, sizeof($teve_febres_infancia)-1)],
                'foi_internado_se_sim_por_quanto_tempo' => $foi_internado_se_sim_por_quanto_tempo[rand(0, sizeof($foi_internado_se_sim_por_quanto_tempo)-1)],
                'ja_fez_cirurgia_se_sim_com_quantos_anos_e_qual_cirugia' => $ja_fez_cirurgia_se_sim_com_quantos_anos_e_qual_cirugia[rand(0, sizeof($ja_fez_cirurgia_se_sim_com_quantos_anos_e_qual_cirugia)-1)],
                'quedas_e_traumatismos' => rand(0,1) >= 0.5,
                'teve_complicacao_com_vacina_se_sim_qual' => $teve_complicacao_com_vacina_se_sim_qual[rand(0, sizeof($teve_complicacao_com_vacina_se_sim_qual)-1)],
                'audicao_e_visao' => $audicao_e_visao[rand(0, sizeof($audicao_e_visao)-1)],
                'sono_tranquilo_se_for_agitado_quando_e_qual_frequencia' => $sono_tranquilo_se_for_agitado_quando_e_qual_frequencia[rand(0, sizeof($sono_tranquilo_se_for_agitado_quando_e_qual_frequencia)-1)],
                'range_dentes' => rand(0,1) >= 0.5,
                'terror_noturno' => rand(0,1) >= 0.5,
                'sonambulistmo' => rand(0,1) >= 0.5,
                'enurese' => rand(0,1) >= 0.5,
                'fala_durante_sono' => rand(0,1) >= 0.5,
                'dorme_so_se_nao_com_quem_dorme' => $dorme_so_se_nao_com_quem_dorme[rand(0, sizeof($dorme_so_se_nao_com_quem_dorme)-1)],
                'ate_quando_dormiu_com_os_pais' => $ate_quando_dormiu_com_os_pais[rand(0, sizeof($ate_quando_dormiu_com_os_pais)-1)],
                'como_foi_a_separacao_dormida_com_os_pais' => $como_foi_a_separacao_dormida_com_os_pais[rand(0, sizeof($como_foi_a_separacao_dormida_com_os_pais)-1)],
                'habitos_especiais_sono' => $habitos_especiais_sono[rand(0, sizeof($habitos_especiais_sono)-1)],
                'com_que_idade_sustentou_a_cabeca' => $com_que_idade_sustentou_a_cabeca[rand(0, sizeof($com_que_idade_sustentou_a_cabeca)-1)],
                'com_que_idade_sentou' => $com_que_idade_sentou[rand(0, sizeof($com_que_idade_sentou)-1)],
                'com_que_idade_engatinhou' =>$com_que_idade_engatinhou[rand(0, sizeof($com_que_idade_engatinhou)-1)],
                'forma_de_engatinhar' => $forma_de_engatinhar[rand(0, sizeof($forma_de_engatinhar)-1)],
                'com_que_idade_comecou_a_andar' => $com_que_idade_comecou_a_andar[rand(0, sizeof($com_que_idade_comecou_a_andar)-1)],
                'caia_muito' => $caia_muito[rand(0, sizeof($caia_muito)-1)],
                'deixa_cair_as_coisas' => $deixa_cair_as_coisas[rand(0, sizeof($deixa_cair_as_coisas)-1)],
                'esbarra_muito' => $esbarra_muito[rand(0, sizeof($esbarra_muito)-1)],
                'acredita_que_apresenta_alguma_dificuldade_motora' => $acredita_que_apresenta_alguma_dificuldade_motora[rand(0, sizeof($acredita_que_apresenta_alguma_dificuldade_motora)-1)],
                'controle_vesical_bexiga' => $controle_vesical_bexiga[rand(0, sizeof($controle_vesical_bexiga)-1)],
                'controle_anal_fezes' => $controle_anal_fezes[rand(0, sizeof($controle_anal_fezes)-1)],
                'foi_difícil_tranquilo_ou_houve_algum_a_pressao_da_família' => $foi_dificil_tranquilo_ou_houve_algum_a_pressao_da_familia[rand(0, sizeof($foi_dificil_tranquilo_ou_houve_algum_a_pressao_da_familia)-1)],
                'balbucios' => $balbucios[rand(0, sizeof($balbucios)-1)],
                'quando_comecou_a_falar' => $quando_comecou_a_falar[rand(0, sizeof($quando_comecou_a_falar)-1)],
                'como_os_pais_reagiram_fala' => $como_os_pais_reagiram_fala[rand(0, sizeof($como_os_pais_reagiram_fala)-1)],
                'apresentou_problema_na_fala_se_sim_quais' => $apresentou_problema_na_fala_se_sim_quais[rand(0, sizeof($apresentou_problema_na_fala_se_sim_quais)-1)],
                'compreende_ordens' => $compreende_ordens[rand(0, sizeof($compreende_ordens)-1)],
                'presenca_de_bilinguismo_em_casa' => $presenca_de_bilinguismo_em_casa[rand(0, sizeof($presenca_de_bilinguismo_em_casa)-1)],
                'como_a_crianca_se_comunica' => $como_a_crianca_se_comunica[rand(0, sizeof($como_a_crianca_se_comunica)-1)],
                'apresenta_salivacao_no_canto_da_boca' => $apresenta_salivacao_no_canto_da_boca[rand(0, sizeof($apresenta_salivacao_no_canto_da_boca)-1)],
                'idade_entrou_na_escola' => $idade_entrou_na_escola[rand(0, sizeof($idade_entrou_na_escola)-1)],
                'adaptouse_bem' => $adaptouse_bem[rand(0, sizeof($adaptouse_bem)-1)],
                'metodo_alfabetizacao' =>$metodo_alfabetizacao[rand(0, sizeof($metodo_alfabetizacao)-1)],
                'mudou_de_escola_se_sim_em_qual_serie_e_idade' => $mudou_de_escola_se_sim_em_qual_serie_e_idade[rand(0, sizeof($mudou_de_escola_se_sim_em_qual_serie_e_idade)-1)],
                'escola_atual' => $escola_atual[rand(0, sizeof($escola_atual)-1)],
                'metodo_alfabetizacao_atual' => $metodo_alfabetizacao_atual[rand(0, sizeof($metodo_alfabetizacao_atual)-1)],
                'professor' =>$professor[rand(0, sizeof($professor)-1)],
                'faz_as_tarefaz_sozinho_se_nao_com_quem_faz' => $faz_as_tarefaz_sozinho_se_nao_com_quem_faz[rand(0, sizeof($faz_as_tarefaz_sozinho_se_nao_com_quem_faz)-1)],
                'descricao_momento_licoes' => $descricao_momento_licoes[rand(0, sizeof($descricao_momento_licoes)-1)],
                'opniao_dos_pais_sobre_escola' => $opniao_dos_pais_sobre_escola[rand(0, sizeof($opniao_dos_pais_sobre_escola)-1)],
                'opniao_dos_pais_sobre_tarefas' => $opniao_dos_pais_sobre_tarefas[rand(0, sizeof($opniao_dos_pais_sobre_tarefas)-1)],
                'fato_importante_vida_escolar' => $fato_importante_vida_escolar[rand(0, sizeof($fato_importante_vida_escolar)-1)],
                'queixas_frequentes' => $queixas_frequentes[rand(0, sizeof($queixas_frequentes)-1)],
                'tem_dificuldades_para' => $tem_dificuldades_para[rand(0, sizeof($tem_dificuldades_para)-1)],
                'conhece_tais_coisas' => $conhece_tais_coisas[rand(0, sizeof($conhece_tais_coisas)-1)],
                'apresenta_tiques_se_sim_quais' => $apresenta_tiques_se_sim_quais[rand(0, sizeof($apresenta_tiques_se_sim_quais)-1)],
                'como_pegua_o_lapis' => $como_pegua_o_lapis[rand(0, sizeof($como_pegua_o_lapis)-1)],
                'forca_da_escrita' => $forca_da_escrita[rand(0, sizeof($forca_da_escrita)-1)],
                'como_acha_que_surgiu_o_problema_a_que_fatores_atribuem' => $como_acha_que_surgiu_o_problema_a_que_fatores_atribuem[rand(0, sizeof($como_acha_que_surgiu_o_problema_a_que_fatores_atribuem)-1)],
                'outras_questoes' => $outras_questoes[rand(0, sizeof($outras_questoes)-1)],
                'escolas_que_frequentou' => $escolas_que_frequentou[rand(0, sizeof($escolas_que_frequentou)-1)],
                'repetiu_ano_se_sim_qual_e_porque' => $repetiu_ano_se_sim_qual_e_porque[rand(0, sizeof($repetiu_ano_se_sim_qual_e_porque)-1)],
                'humor_habitual' => $humor_habitual[rand(0, sizeof($humor_habitual)-1)],
                'prefere_brincar_sozinho_ou_em_grupos' => $prefere_brincar_sozinho_ou_em_grupos[rand(0, sizeof($prefere_brincar_sozinho_ou_em_grupos)-1)],
                'estranha_mudancas_de_ambiente' => $estranha_mudancas_de_ambiente[rand(0, sizeof($estranha_mudancas_de_ambiente)-1)],
                'adaptase_facilmente_ao_meio' => rand(0,1) >= 0.5,
            ]);
        }
    }
}
