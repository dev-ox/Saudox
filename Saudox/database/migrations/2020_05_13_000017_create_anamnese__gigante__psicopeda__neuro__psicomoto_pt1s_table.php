<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnamneseGigantePsicopedaNeuroPsicomotoPt1sTable extends Migration {

    public function up() {
        Schema::create('anamnese__pnp__pt1s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            /* Resumindo o nome pq é mt grande */
            /* Era pra ser: id_tabela_principal, ficou id_tp */
            $table->bigInteger('id_tp')->unsigned();
            $table->bigInteger('id_paciente')->unsigned();
            $table->bigInteger('id_profissional')->unsigned();
            $table->foreign('id_tp')->references('id')->on('anamnese__gigante__psicopeda__neuro__psicomotos');
            $table->foreign('id_paciente')->references('id')->on('pacientes');
            $table->foreign('id_profissional')->references('id')->on('profissionals');
            $table->string('compareceram_entrevista')->nullable(true);
            $table->text('queixa')->nullable(true);
            $table->string('escolaridade')->nullable(true);
            $table->string('turno_das_aulas')->nullable(true);
            $table->string('horario_das_aulas')->nullable(true);
            $table->string('escola')->nullable(true);
            $table->boolean('escola_publica_privada')->nullable(true);
            $table->string('professor_responsavel')->nullable(true);
            $table->string('coordenador')->nullable(true);
            $table->boolean('encaminhado_pela_escola')->nullable(true);
            $table->string('profissao_pai')->nullable(true);
            $table->string('profissao_mae')->nullable(true);
            $table->string('escolaridade_pai')->nullable(true);
            $table->string('escolaridade_mae')->nullable(true);
            $table->string('relacao_dos_pais_hoje')->nullable(true);
            $table->text('outras_crianças_e_parentes_que_moram_com_a_criança')->nullable(true);
            $table->string('tratamento_para_infertilidade')->nullable(true)->nullable(true);
            $table->string('historia_familiar_de_doenca_neurologica')->nullable(true);
            $table->string('convulcoes')->nullable(true);
            $table->text('como_era_composta_a_familia_na_epoca_da_concepcao')->nullable(true);
            $table->unsignedInteger('idade_dos_pais_na_epoca_mãe')->nullable(true);
            $table->unsignedInteger('idade_dos_pais_na_epoca_pai')->nullable(true);
            $table->boolean('gestacoes_anteriores')->nullable(true);
            $table->unsignedInteger('abortos')->nullable(true);
            $table->unsignedInteger('naturais')->nullable(true);
            $table->unsignedInteger('provocados')->nullable(true);
            $table->boolean('perdeu_algum_filho')->nullable(true);
            $table->boolean('a_perca_foi_antes_do_paciente')->nullable(true);
            $table->string('como_perdeu_o_filho')->nullable(true);
            $table->string('como_foi_a_aceitacao_das_familias')->nullable(true);
            $table->string('gravidez_planejada_por_ambos')->nullable(true);
            $table->boolean('fez_tratamento_pre_natal')->nullable(true);
            $table->string('sofreu_acidentes_quedas_se_sim_como_foi')->nullable(true);
            $table->string('teve_alguma_doenca_na_gestacao')->nullable(true);
            $table->string('tomou_alguma_medicacao_se_sim_qual')->nullable(true);
            $table->boolean('enjoo')->nullable(true);
            $table->boolean('bebeu')->nullable(true);
            $table->boolean('fumou')->nullable(true);
            $table->string('entrou_em_contato_com_algum_produto_quimicotoxico_se_sim_qual')->nullable(true);
            $table->boolean('esteve_em_ambientes_com_alto_nivel_de_poluicao')->nullable(true);
            $table->boolean('exposição_a_raiox')->nullable(true);
            $table->string('qual_era_a_situacao_economica_do_casal_na_epoca')->nullable(true);
            $table->string('ja_tinham_outros_filhos_se_sim_quantos')->nullable(true);
            $table->boolean('mae_trabalhava_fora_durante_gravidez')->nullable(true);
            $table->string('casal_ou_familia_de_ambos_possui_doenca_hereditaria_se_sim_qual')->nullable(true);
            $table->string('local_parto')->nullable(true);
            $table->string('tipo_parto')->nullable(true);
            $table->string('algum_problema_no_parto_se_sim_qual')->nullable(true);
            $table->float('peso_ao_nascer')->nullable(true);
            $table->float('comprimento_ao_nascer')->nullable(true);
            $table->boolean('teve_ictericia')->nullable(true);
            $table->string('idade_gestacional_do_bebe_ao_nascer')->nullable(true);
            $table->text('como_se_deu_a_alimentação')->nullable(true);
            $table->string('mamou_no_seio_se_nao_qual_o_motivo')->nullable(true);
            $table->text('se_mamou_foi_ate_quando_e_como_se_sentia_ao_amamentar')->nullable(true);
            $table->string('tomou_mamadeira_ate_quando')->nullable(true);
            $table->boolean('aceitou_bem_a_alimentação_pastosa')->nullable(true);
            $table->boolean('aceitou_bem_a_alimentação_solida')->nullable(true);
            $table->boolean('usa_copo')->nullable(true);
            $table->text('alimentacao_atual')->nullable(true);
            $table->string('retardo_diabetes_síndromes_doenças_nervosas_epilepsia')->nullable(true);
            $table->string('teve_sarampo_infancia')->nullable(true);
            $table->string('teve_dores_ouvido_infancia')->nullable(true);
            $table->string('teve_colicas_infancia')->nullable(true);
            $table->string('teve_catapora_infancia')->nullable(true);
            $table->string('teve_caxumba_infancia')->nullable(true);
            $table->string('teve_rubeola_infancia')->nullable(true);
            $table->string('teve_coqueluche_infancia')->nullable(true);
            $table->string('teve_meningite_infancia')->nullable(true);
            $table->string('teve_desidratacao_infancia')->nullable(true);

             /* O responsavel_por_este_documento é o profissional que tem a
             * resposabilidade, então ele vai ta no json de pode ver e pode
             * editar.
             * Toda vez que um profissional ver ou editar este documento, seu
             * id vai ser salvo no campo responsavel_por_este_documento.
             */

            /* Cada json vai ter 2 arrays, o primeiro com os ids dos
             * profissionais que vao ter o acesso de leitura,
             * e o segundo de edição. Lembrar que é tudo em string.
             */
            $table->unsignedInteger('responsavel_por_este_documento')->nullable();
            $table->json('id_pode_ver')->nullable();
            $table->json('id_pode_editar')->nullable();
        });
    }

    public function down() {
        Schema::dropIfExists('anamnese__gigante__psicopeda__neuro__psicomoto_pt1s');
    }
}
