<?php

use Illuminate\Database\Seeder;

class AnamneseGigantePsicopedaNeuroPsicomotosPt1AutSeeds extends Seeder {

    public function run() {
        include('database/seeds/SeedsConfig.php');
        include_once('database/seeds/FuncoesAuxuliaresSeeds.php');

        //Gerando anamnese gigante parte 1 automaticamente
        for($i = 0; $i < $qtd_anamnese_gigante; $i++){
            DB::table('anamnese__pnp__pt1s')->insert([
                'id_tp' => ($i + 1),
                'id_paciente' => rand(1,$qtd_pacientes),
                'id_profissional' => rand(1,$qtd_profissionals),
                'compareceram_entrevista' => Str::random(10),
                'queixa' => texto(20),
                'escolaridade' => Str::random(10),
                'turno_das_aulas' => Str::random(10),
                'horario_das_aulas' => Str::random(10),
                'escola' => Str::random(10),
                'escola_publica_privada' => rand(0,1) >= 0.5,
                'professor_responsavel' => Str::random(10),
                'coordenador' => Str::random(10),
                'encaminhado_pela_escola' => rand(0,1) >= 0.5,
                'profissao_pai' => Str::random(10),
                'profissao_mae' => Str::random(10),
                'escolaridade_pai' => Str::random(10),
                'escolaridade_mae' => Str::random(10),
                'relacao_dos_pais_hoje' => Str::random(10),
                'outras_crianças_e_parentes_que_moram_com_a_criança' => texto(5),
                'tratamento_para_infertilidade' => Str::random(10),
                'historia_familiar_de_doenca_neurologica' => Str::random(10),
                'convulcoes' => Str::random(10),
                'como_era_composta_a_familia_na_epoca_da_concepcao' => texto(8),
                'idade_dos_pais_na_epoca_mãe' => rand(20,80),
                'idade_dos_pais_na_epoca_pai' => rand(20,80),
                'gestacoes_anteriores' => rand(0,1) >= 0.5,
                'abortos' => rand(0,3),
                'naturais' => rand(0,3),
                'provocados' => rand(0,3),
                'perdeu_algum_filho' => rand(0,1) >= 0.5,
                'a_perca_foi_antes_do_paciente' => rand(0,1) >= 0.5,
                'como_perdeu_o_filho' => Str::random(10),
                'como_foi_a_aceitacao_das_familias' => Str::random(10),
                'gravidez_planejada_por_ambos' => rand(0,1) >= 0.5,
                'fez_tratamento_pre_natal' => rand(0,1) >= 0.5,
                'sofreu_acidentes_quedas_se_sim_como_foi' => Str::random(10),
                'teve_alguma_doenca_na_gestacao' => Str::random(10),
                'tomou_alguma_medicacao_se_sim_qual' => Str::random(10),
                'enjoo' => rand(0,1) >= 0.5,
                'bebeu' => rand(0,1) >= 0.5,
                'fumou' => rand(0,1) >= 0.5,
                'entrou_em_contato_com_algum_produto_quimicotoxico_se_sim_qual' => Str::random(10),
                'esteve_em_ambientes_com_alto_nivel_de_poluicao' => rand(0,1) >= 0.5,
                'exposição_a_raiox' => rand(0,1) >= 0.5,
                'qual_era_a_situacao_economica_do_casal_na_epoca' => Str::random(10),
                'ja_tinham_outros_filhos_se_sim_quantos' => Str::random(10),
                'mae_trabalhava_fora_durante_gravidez' => rand(0,1) >= 0.5,
                'casal_ou_familia_de_ambos_possui_doenca_hereditaria_se_sim_qual' => Str::random(10),
                'local_parto' => Str::random(10),
                'tipo_parto' => Str::random(10),
                'algum_problema_no_parto_se_sim_qual' => Str::random(10),
                'peso_ao_nascer' => (float)rand(0.1,4.0),
                'comprimento_ao_nascer' => (float)rand(0.3,0.5),
                'teve_ictericia' => rand(0,1) >= 0.5,
                'idade_gestacional_do_bebe_ao_nascer' => Str::random(10),
                'como_se_deu_a_alimentação' => texto(5),
                'mamou_no_seio_se_nao_qual_o_motivo' => Str::random(10),
                'se_mamou_foi_ate_quando_e_como_se_sentia_ao_amamentar' => texto(5),
                'tomou_mamadeira_ate_quando' => Str::random(10),
                'aceitou_bem_a_alimentação_pastosa' => rand(0,1) >= 0.5,
                'aceitou_bem_a_alimentação_solida' => rand(0,1) >= 0.5,
                'alimentacao_atual' => texto(5),
                'retardo_diabetes_síndromes_doenças_nervosas_epilepsia' => Str::random(10),
                'teve_sarampo_infancia' => Str::random(10),
                'teve_dores_ouvido_infancia' => Str::random(10),
                'teve_colicas_infancia' => Str::random(10),
                'teve_catapora_infancia' => Str::random(10),
                'teve_caxumba_infancia' => Str::random(10),
                'teve_rubeola_infancia' => Str::random(10),
                'teve_coqueluche_infancia' => Str::random(10),
                'teve_meningite_infancia' => Str::random(10),
                'teve_desidratacao_infancia' => Str::random(10),
            ]);
        }
    }
}
