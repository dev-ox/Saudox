<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnamneseFonoaudiologiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anamnese_fonoaudiologias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->bigInteger('id_paciente')->unsigned();
            $table->bigInteger('id_profissional')->unsigned();
            $table->foreign('id_paciente')->references('id')->on('pacientes');
            $table->foreign('id_profissional')->references('id')->on('profissionals');
            $table->string('responsavel_pelo_paciente');
            $table->unsignedInteger('numero_de_irmaos');
            $table->string('posicao_bloco_familiar');
            $table->text('status_relacao_pais');
            $table->text('reacao_crianca_status_relacao_pais');
            $table->string('se_pais_separados_paciente_vive_com_quem');
            $table->boolean('crianca_desejada')->default(true);
            $table->unsignedInteger('idade_mae');
            $table->unsignedInteger('idade_pai');
            $table->text('tinha_expectativa_em_relacao_ao_sexo_da_crianca')->default("Não");
            $table->string('duracao_da_gestacao')->default("9 Meses");
            $table->string('fez_pre_natal');
            $table->string('tipo_parto');
            $table->text('complicacao_durante_parto');
            $table->text('foi_necessario_utilizar_algum_recurso');
            $table->text('mae_apresentou_algum_problema_durante_gravidez');
            $table->boolean('amamentacao_natural');
            $table->boolean('atraso_ou_problema_na_fala');
            $table->boolean('tem_enurese_noturna');
            $table->boolean('desenvolvimento_motor_no_tempo_esperado');
            $table->boolean('perturbacoes_como_pesadelos_sonambulismo_agitacao_etc');
            $table->text('letras_ou_fonemas_trocados')->default("Não");
            $table->text('fatos_que_afetaram_o_desenvolvimento_do_paciente');
            $table->string('ate_quantos_anos_usou_chupetas');
            $table->boolean('ja_fez_tratamento_fonoaudiologo');
            $table->text('se_sim_tratamento_fono_anterior_onde')->default("Não fez");
            $table->text('se_sim_tratamento_fono_anterior_quando')->default("Não fez");
            $table->text('dificuldades_na_fala');
            $table->text('dificuldades_na_visao');
            $table->text('dificuldades_na_locomocao');
            $table->text('problemas_de_saude');
            $table->text('toma_ou_ja_tomou_remedio_controlado_se_sim_quais');
            $table->boolean('toma_banho_sozinho');
            $table->boolean('escova_os_dentes_sozinho');
            $table->boolean('usa_o_banheiro_sozinho');
            $table->boolean('necessita_de_auxilio_para_se_vestir_ou_despir');
            $table->boolean('atende_as_intervencoes_quando_esta_desobedecendo');
            $table->boolean('chora_facil');
            $table->boolean('recusa_auxilio');
            $table->string('tem_resistencia_ao_toque');
            $table->string('serie_atual_na_escola');
            $table->boolean('alfabetizada');
            $table->text('tem_dificuldades_de_aprendizagem');
            $table->boolean('repetiu_algum_ano');
            $table->string('faz_amigos_com_facilidade');
            $table->string('adapta_se_facilmente_ao_meio');
            $table->text('companheiros_da_crianca_nas_brincadeiras');
            $table->text('distracoes_preferidas');
            $table->text('atitudes_sociais_predominantes');
            $table->text('comportamento_emocional');
            $table->text('comportamento_sono');
            $table->boolean('dorme_sozinho');
            $table->boolean('dorme_no_quarto_dos_pais');
            $table->text('medidas_disciplinares_empregadas_pelos_pais');
            $table->text('outras_ocorrencias_observacoes');
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anamnese_fonoaudiologias');
    }
}
