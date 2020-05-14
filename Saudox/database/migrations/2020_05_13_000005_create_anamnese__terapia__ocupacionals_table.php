<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnamneseTerapiaOcupacionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anamnese__terapia__ocupacionals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->bigInteger('id_paciente')->unsigned();
            $table->bigInteger('id_profissional')->unsigned();
            $table->foreign('id_paciente')->references('id')->on('pacientes');
            $table->foreign('id_profissional')->references('id')->on('profissionals');
            $table->string('gestacao')->default("Completa");
            $table->string('doencas_da_mae_na_gravidez')->default("Não");
            $table->text('inquietacoes_da_mae_na_gravidez')->default("Não");
            $table->string('parto')->default("Normal");
            $table->string('amamentacao_natural')->default("Natural");
            $table->string('dificuldade_ou_atraso_no_controle_do_esfincter')->default("Não");
            $table->string('desenvolvimento_motor_no_tempo_certo')->default("Sim");
            $table->string('perturbacoes_no_sono')->default("Não");
            $table->string('habitos_especiais_ao_dormir')->default("Não");
            $table->string('troca_letras_ou_fonemas')->default("Não");
            $table->string('dificuldade_na_fala')->default("Não");
            $table->string('dificuldade_na_visao')->default("Não");
            $table->string('dificuldade_na_locomocao')->default("Não");
            $table->boolean('movimentos_estereotipados')->default(false);
            $table->boolean('ecolalias')->default(false);
            $table->string('toma_banho_sozinho')->default("Sim");
            $table->string('escova_os_dentes_sozinho')->default("Sim");
            $table->string('usa_o_banheiro_sozinho')->default("Sim");
            $table->string('necessita_auxilio_para_se_vestir_ou_despir')->default("Não");
            $table->string('idade_da_retirada_das_fraldas');
            $table->string('atende_intervencoes_quando_esta_desobedecendo')->default("Sim");
            $table->string('chora_facil')->default("Não");
            $table->string('recusa_auxílio')->default("Não");
            $table->string('resistencia_ao_toque')->default("Não");
            $table->boolean('crianca_estuda')->default(false);
            $table->string('ja_estudou_antes_em_outra_escola')->default("Não");
            $table->string('motivo_transferencia_escola_se_estudou_em_outra_antes')->nullable(true);
            $table->string('ja_repetiu_alguma_serie')->default("Não");
            $table->string('possui_acompanhante_terapeutico_em_sala')->default("Não");
            $table->string('recebe_orientacao_aos_deveres_em_casa')->default("Não");
            $table->text('quem_orienta_os_deveres_em_casa_se_sim_orientacao_deveres')->nullable(true);
            $table->string('quanto_tempo_executa_os_deveres_em_casa')->default("Não");
            $table->string('quais_linguas_estrangeiras_fala')->default("Não");
            $table->string('quais_esportes_pratica')->default("Não");
            $table->string('quais_intrumentos_toca')->default("Não");
            $table->string('outras_atividades_que_pratica')->default("Não");
            $table->string('faz_amigos_com_facilidade')->default("Não");
            $table->string('adaptase_facilmente_ao_meio')->default("Não");
            $table->string('companheiros_da_crianca_em_brincadeiras')->default("Nenhum");
            $table->string('escolha_de_grupo');
            $table->string('distracoes_preferidas');
            $table->boolean('obediente')->default(false);
            $table->boolean('dependente')->default(false);
            $table->boolean('comunicativo')->default(false);
            $table->boolean('agressivo')->default(false);
            $table->boolean('cooperativo')->default(false);
            $table->string('descricao_se_sim_dependente')->nullable(true);
            $table->string('descricao_se_sim_indepedente')->nullable(true);
            $table->string('descricao_se_sim_agressivo')->nullable(true);
            $table->string('descricao_se_sim_cooperador')->nullable(true);
            $table->boolean('tranquilo')->default(false);
            $table->boolean('seguro')->default(false);
            $table->boolean('ansioso')->default(false);
            $table->boolean('emotivo')->default(false);
            $table->boolean('alegre')->default(false);
            $table->boolean('queixoso')->default(false);
            $table->boolean('insonia')->default(false);
            $table->boolean('pesadelos')->default(false);
            $table->boolean('hipersonia')->default(false);
            $table->boolean('dorme_sozinho')->default(false);
            $table->boolean('dorme_no_quarto_dos_pais')->default(false);
            $table->string('divide_quarto_com_alguem')->default("Não");
            $table->text('medidas_disciplinares_empregadas_pelos_pais');
            $table->text('reação_do_filho_ao_ser_contrariado');
            $table->text('atitude_dos_pais_a_reacao_filho_contrareado');
            $table->text('acompanhamento_medico');
            $table->string('qual_medico_responsavel');
            $table->longText('diagnostico_medico');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anamnese__terapia__ocupacionals');
    }
}
