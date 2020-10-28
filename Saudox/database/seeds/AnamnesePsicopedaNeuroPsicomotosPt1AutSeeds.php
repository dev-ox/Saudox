<?php

use Illuminate\Database\Seeder;

class AnamneseGigantePsicopedaNeuroPsicomotosPt1AutSeeds extends Seeder {

    public function run() {
        include('database/seeds/SeedsConfig.php');
        include_once('database/seeds/FuncoesAuxuliaresSeeds.php');

        $compareceram_entrevista = ['Pais', 'Mãe', 'Pai', 'Tio(a)', 'Avô(ó)', 'Irmão'];
        $queixa = ['Questão da comunicação', 'Problemas na alimentação', 'Problemas para vestir roupa'];
        $escolaridade = ['Educação Infantil', '1º Ensino Fundamental I', '2º Ensino Fundamental I', '3º Ensino Fundamental I', '4º Ensino Fundamental I', '5º Ensino Fundamental I', '6º Ensino Fundamental II', '7º Ensino Fundamental II', '8º Ensino Fundamental II', '9º Ensino Fundamental II', '1º Ensino Médio', '2º Ensino Médio', '3º Ensino Médio'];
        $turno_das_aulas = ['Manhã', 'Tarde', 'Noite'];
        $horario_das_aulas = ['7h30 até 11h50', '13h00 até 17h30'];
        $escola = ['Educandário Santa Isabel', 'Educandário Saber Crescer', 'Escola de Aplicação Professora Ivonita Alves Guerra', 'Educandário Cecília Meireles', 'Escola Simôa Gomes', 'Educandário Santo André'];
        $professor_responsavel = ['Ana Paula', 'Juliana Santana', 'Aparecida da Silva', 'Luzia Almeida', 'Júlia Vasconcelos', 'Francisca Ferreira', 'Helena Serafim', 'Larissa Nascimento', 'Cláudia Barbosa', 'Monique Freitas', 'Cristina Xavier'];
        $coordenador = ['Ana Paula', 'Juliana Santana', 'Aparecida da Silva', 'Luzia Almeida', 'Júlia Vasconcelos', 'Francisca Ferreira', 'Helena Serafim', 'Larissa Nascimento', 'Cláudia Barbosa', 'Monique Freitas', 'Cristina Xavier'];
        $profissao_pai = ['Autônomo', 'Engenheiro civil', 'Advogado', 'YouTuber', 'Padeiro', 'Taxista', 'Professor', 'Garçom', 'Desenvolvedor de software', 'Padeiro', 'Eletricista', 'Jogador de futebol', 'Músico'];
        $profissao_mae = ['Autônoma', 'Manicure', 'Professora', 'Diarista', 'Cantora', 'Enfermeira', 'Contadora', 'Administradora', 'Assistente Social', 'Fisioterapeuta', 'Veterinária'];
        $escolaridade_pai = ['Não alfabetizado', 'Ensino fundamental incompleto', 'Ensino fundamental completo', 'Ensino médio incompleto', 'Ensino médio completo', 'Ensino superior incompleto', 'Ensino superior completo'];
        $escolaridade_mae = ['Não alfabetizada', 'Ensino fundamental incompleto', 'Ensino fundamental completo', 'Ensino médio incompleto', 'Ensino médio completo', 'Ensino superior incompleto', 'Ensino superior completo'];
        $relacao_dos_pais_hoje = ['Boa relação', 'Brigas constantes'];
        $outras_criancas_e_parentes_que_moram_com_a_crianca = ['Não mora mais ninguém', 'Irmão'];
        $tratamento_para_infertilidade = ['Sim', 'Não'];
        $historia_familiar_de_doenca_neurologica = ['Sim', 'Não'];
        $convulcoes = ['Não teve', 'Teve'];
        $como_era_composta_a_familia_na_epoca_da_concepcao = ['Mãe - irmão', 'Pai - mãe - irmão'];
        $como_perdeu_o_filho = ['Aborto espontâneo', 'Aborto induzido seguro'];
        $como_foi_a_aceitacao_das_familias = ['Aceitou bem'];
        $sofreu_acidentes_quedas_se_sim_como_foi = ['Não sofreu'];
        $teve_alguma_doenca_na_gestacao = ['Não',  'Sim, asma', 'Sim, anemia'];
        $tomou_alguma_medicacao_se_sim_qual = ['Não tomou', 'Sim, paracetamol', 'Sim, vitamina D3'];
        $entrou_em_contato_com_algum_produto_quimicotoxico_se_sim_qual = ['Não', 'Sim, pesticidas', 'Sim, alvejante'];
        $qual_era_a_situacao_economica_do_casal_na_epoca = ['Vulnerável', 'Confortável'];
        $ja_tinham_outros_filhos_se_sim_quantos = ['Não', 'Sim, um', 'Sim, dois', 'Sim, três ou mais'];
        $casal_ou_familia_de_ambos_possui_doenca_hereditaria_se_sim_qual = ['Não possui', 'Sim, diabetes', 'Sim, anemia falciforme'];
        $local_parto = ['Hospital', 'Em casa'];
        $tipo_parto = ['Normal', 'Cesariana', 'Fórceps'];
        $algum_problema_no_parto_se_sim_qual = ['Não', 'Sim, ruptura prematura das membranas', 'Sim, posição e apresentação anormal do feto'];
        $como_se_deu_a_alimentacao = ['Alimentação intravenosa', 'Amamentação'];
        $mamou_no_seio_se_nao_qual_o_motivo = ['Sim', 'Não, baixa produção'];
        $se_mamou_foi_ate_quando_e_como_se_sentia_ao_amamentar = ['Não foi amamentado', 'Até os 6 meses, se sentia bem', 'Até um anos, se sentia bem'];
        $tomou_mamadeira_ate_quando = ['Um ano', 'Dois anos', 'Três anos ou mais'];
        $alimentacao_atual = ['Frutas e verduras', 'Alimentos industrializados'];
        $retardo_diabetes_sindromes_doencas_nervosas_epilepsia = ['Não'];
        $teve_sarampo_infancia = ['Sim', 'Não'];
        $teve_dores_ouvido_infancia = ['Sim', 'Não'];
        $teve_colicas_infancia = ['Sim', 'Não'];
        $teve_catapora_infancia = ['Sim', 'Não'];
        $teve_caxumba_infancia = ['Sim', 'Não'];
        $teve_rubeola_infancia = ['Sim', 'Não'];
        $teve_coqueluche_infancia = ['Sim', 'Não'];
        $teve_meningite_infancia = ['Sim', 'Não'];
        $teve_desidratacao_infancia = ['Sim', 'Não'];

        //Gerando anamnese gigante parte 1 automaticamente
        for($i = 0; $i < $qtd_anamnese_gigante; $i++){
            DB::table('anamnese__pnp__pt1s')->insert([
                'id_tp' => ($i + 1),
                'id_paciente' => rand(1,$qtd_pacientes),
                'id_profissional' => rand(1,$qtd_profissionals),
                'compareceram_entrevista' => $compareceram_entrevista[rand(0, sizeof($compareceram_entrevista)-1)],
                'queixa' => $queixa[rand(0, sizeof($queixa)-1)],
                'escolaridade' => $escolaridade[rand(0, sizeof($escolaridade)-1)],
                'turno_das_aulas' => $turno_das_aulas[rand(0, sizeof($turno_das_aulas)-1)],
                'horario_das_aulas' => $horario_das_aulas[rand(0, sizeof($horario_das_aulas)-1)],
                'escola' => $escola[rand(0, sizeof($escola)-1)],
                'escola_publica_privada' => rand(0,1) >= 0.5,
                'professor_responsavel' => $professor_responsavel[rand(0, sizeof($professor_responsavel)-1)],
                'coordenador' => $coordenador[rand(0, sizeof($coordenador)-1)],
                'encaminhado_pela_escola' => rand(0,1) >= 0.5,
                'profissao_pai' => $profissao_pai[rand(0, sizeof($profissao_pai)-1)],
                'profissao_mae' =>$profissao_mae[rand(0, sizeof($profissao_mae)-1)],
                'escolaridade_pai' => $escolaridade_pai[rand(0, sizeof($escolaridade_pai)-1)],
                'escolaridade_mae' => $escolaridade_mae[rand(0, sizeof($escolaridade_mae)-1)],
                'relacao_dos_pais_hoje' => $relacao_dos_pais_hoje[rand(0, sizeof($relacao_dos_pais_hoje)-1)],
                'outras_crianças_e_parentes_que_moram_com_a_criança' => $outras_criancas_e_parentes_que_moram_com_a_crianca[rand(0, sizeof($outras_criancas_e_parentes_que_moram_com_a_crianca)-1)],
                'tratamento_para_infertilidade' => $tratamento_para_infertilidade[rand(0, sizeof($tratamento_para_infertilidade)-1)],
                'historia_familiar_de_doenca_neurologica' => $historia_familiar_de_doenca_neurologica[rand(0, sizeof($historia_familiar_de_doenca_neurologica)-1)],
                'convulcoes' => $convulcoes[rand(0, sizeof($convulcoes)-1)],
                'como_era_composta_a_familia_na_epoca_da_concepcao' => $como_era_composta_a_familia_na_epoca_da_concepcao[rand(0, sizeof($como_era_composta_a_familia_na_epoca_da_concepcao)-1)],
                'idade_dos_pais_na_epoca_mãe' => rand(20,80),
                'idade_dos_pais_na_epoca_pai' => rand(20,80),
                'gestacoes_anteriores' => rand(0,1) >= 0.5,
                'abortos' => rand(0,3),
                'naturais' => rand(0,3),
                'provocados' => rand(0,3),
                'perdeu_algum_filho' => rand(0,1) >= 0.5,
                'a_perca_foi_antes_do_paciente' => rand(0,1) >= 0.5,
                'como_perdeu_o_filho' => $como_perdeu_o_filho[rand(0, sizeof($como_perdeu_o_filho)-1)],
                'como_foi_a_aceitacao_das_familias' => $como_foi_a_aceitacao_das_familias[rand(0, sizeof($como_foi_a_aceitacao_das_familias)-1)],
                'gravidez_planejada_por_ambos' => rand(0,1) >= 0.5,
                'fez_tratamento_pre_natal' => rand(0,1) >= 0.5,
                'sofreu_acidentes_quedas_se_sim_como_foi' => $sofreu_acidentes_quedas_se_sim_como_foi[rand(0, sizeof($sofreu_acidentes_quedas_se_sim_como_foi)-1)],
                'teve_alguma_doenca_na_gestacao' => $teve_alguma_doenca_na_gestacao[rand(0, sizeof($teve_alguma_doenca_na_gestacao)-1)],
                'tomou_alguma_medicacao_se_sim_qual' => $tomou_alguma_medicacao_se_sim_qual[rand(0, sizeof($tomou_alguma_medicacao_se_sim_qual)-1)],
                'enjoo' => rand(0,1) >= 0.5,
                'bebeu' => rand(0,1) >= 0.5,
                'fumou' => rand(0,1) >= 0.5,
                'entrou_em_contato_com_algum_produto_quimicotoxico_se_sim_qual' => $entrou_em_contato_com_algum_produto_quimicotoxico_se_sim_qual[rand(0, sizeof($entrou_em_contato_com_algum_produto_quimicotoxico_se_sim_qual)-1)],
                'esteve_em_ambientes_com_alto_nivel_de_poluicao' => rand(0,1) >= 0.5,
                'exposição_a_raiox' => rand(0,1) >= 0.5,
                'qual_era_a_situacao_economica_do_casal_na_epoca' => $qual_era_a_situacao_economica_do_casal_na_epoca[rand(0, sizeof($qual_era_a_situacao_economica_do_casal_na_epoca)-1)],
                'ja_tinham_outros_filhos_se_sim_quantos' => $ja_tinham_outros_filhos_se_sim_quantos[rand(0, sizeof($ja_tinham_outros_filhos_se_sim_quantos)-1)],
                'mae_trabalhava_fora_durante_gravidez' => rand(0,1) >= 0.5,
                'casal_ou_familia_de_ambos_possui_doenca_hereditaria_se_sim_qual' => $casal_ou_familia_de_ambos_possui_doenca_hereditaria_se_sim_qual[rand(0, sizeof($casal_ou_familia_de_ambos_possui_doenca_hereditaria_se_sim_qual)-1)],
                'local_parto' => $local_parto[rand(0, sizeof($local_parto)-1)],
                'tipo_parto' => $tipo_parto[rand(0, sizeof($tipo_parto)-1)],
                'algum_problema_no_parto_se_sim_qual' => $algum_problema_no_parto_se_sim_qual[rand(0, sizeof($algum_problema_no_parto_se_sim_qual)-1)],
                'peso_ao_nascer' => (float)rand(0.1,4.0),
                'comprimento_ao_nascer' => (float)rand(0.3,0.5),
                'teve_ictericia' => rand(0,1) >= 0.5,
                'idade_gestacional_do_bebe_ao_nascer' => rand(39,42),
                'como_se_deu_a_alimentação' => $como_se_deu_a_alimentacao[rand(0, sizeof($como_se_deu_a_alimentacao)-1)],
                'mamou_no_seio_se_nao_qual_o_motivo' => $mamou_no_seio_se_nao_qual_o_motivo[rand(0, sizeof($mamou_no_seio_se_nao_qual_o_motivo)-1)],
                'se_mamou_foi_ate_quando_e_como_se_sentia_ao_amamentar' => $se_mamou_foi_ate_quando_e_como_se_sentia_ao_amamentar[rand(0, sizeof($se_mamou_foi_ate_quando_e_como_se_sentia_ao_amamentar)-1)],
                'tomou_mamadeira_ate_quando' => $tomou_mamadeira_ate_quando[rand(0, sizeof($tomou_mamadeira_ate_quando)-1)],
                'aceitou_bem_a_alimentação_pastosa' => rand(0,1) >= 0.5,
                'aceitou_bem_a_alimentação_solida' => rand(0,1) >= 0.5,
                'alimentacao_atual' => $alimentacao_atual[rand(0, sizeof($alimentacao_atual)-1)],
                'retardo_diabetes_síndromes_doenças_nervosas_epilepsia' => $retardo_diabetes_sindromes_doencas_nervosas_epilepsia[rand(0, sizeof($retardo_diabetes_sindromes_doencas_nervosas_epilepsia)-1)],
                'teve_sarampo_infancia' => $teve_sarampo_infancia[rand(0, sizeof($teve_sarampo_infancia)-1)],
                'teve_dores_ouvido_infancia' => $teve_dores_ouvido_infancia[rand(0, sizeof($teve_dores_ouvido_infancia)-1)],
                'teve_colicas_infancia' => $teve_colicas_infancia[rand(0, sizeof($teve_colicas_infancia)-1)],
                'teve_catapora_infancia' => $teve_catapora_infancia[rand(0, sizeof($teve_catapora_infancia)-1)],
                'teve_caxumba_infancia' => $teve_caxumba_infancia[rand(0, sizeof($teve_caxumba_infancia)-1)],
                'teve_rubeola_infancia' => $teve_rubeola_infancia[rand(0, sizeof($teve_rubeola_infancia)-1)],
                'teve_coqueluche_infancia' => $teve_coqueluche_infancia[rand(0, sizeof($teve_coqueluche_infancia)-1)],
                'teve_meningite_infancia' => $teve_meningite_infancia[rand(0, sizeof($teve_meningite_infancia)-1)],
                'teve_desidratacao_infancia' => $teve_desidratacao_infancia[rand(0, sizeof($teve_desidratacao_infancia)-1)],
            ]);
        }
    }
}
