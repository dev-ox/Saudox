<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnamneseGigantePsicopedaNeuroPsicomotoPt2sTable extends Migration {

    public function up() {
        Schema::create('anamnese__pnp__pt2s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->bigInteger('id_tp')->unsigned();
            $table->foreign('id_tp')->references('id')->on('anamnese__gigante__psicopeda__neuro__psicomotos');
            $table->string('teve_otite_infancia')->nullable(true);
            $table->string('teve_adenoides_infancia')->nullable(true);
            $table->string('teve_amigdalites_infancia')->nullable(true);
            $table->string('teve_alergias_infancia')->nullable(true);
            $table->string('teve_acidentes_infancia')->nullable(true);
            $table->string('teve_convulsoes_infancia')->nullable(true);
            $table->string('teve_febres_infancia')->nullable(true);
            $table->string('foi_internado_se_sim_por_quanto_tempo')->nullable(true);
            $table->text('ja_fez_cirurgia_se_sim_com_quantos_anos_e_qual_cirugia')->nullable(true);
            $table->boolean('quedas_e_traumatismos')->nullable(true);
            $table->string('teve_complicacao_com_vacina_se_sim_qual')->nullable(true);
            $table->string('audicao_e_visao')->nullable(true);
            $table->text('sono_tranquilo_se_for_agitado_quando_e_qual_frequencia')->nullable(true);
            $table->boolean('range_dentes')->nullable(true);
            $table->boolean('terror_noturno')->nullable(true);
            $table->boolean('sonambulistmo')->nullable(true);
            $table->boolean('enurese')->nullable(true);
            $table->boolean('fala_durante_sono')->nullable(true);
            $table->text('dorme_so_se_nao_com_quem_dorme')->nullable(true);
            $table->string('ate_quando_dormiu_com_os_pais')->nullable(true);
            $table->string('como_foi_a_separacao_dormida_com_os_pais')->nullable(true);
            $table->string('habitos_especiais_sono')->nullable(true);

            $table->string('com_que_idade_sustentou_a_cabeca')->nullable(true);
            $table->string('com_que_idade_sentou')->nullable(true);
            $table->string('com_que_idade_engatinhou')->nullable(true);
            $table->string('forma_de_engatinhar')->nullable(true);
            $table->string('com_que_idade_comecou_a_andar')->nullable(true);
            $table->string('caia_muito')->nullable(true);
            $table->string('deixa_cair_as_coisas')->nullable(true);
            $table->string('esbarra_muito')->nullable(true);
            $table->string('acredita_que_apresenta_alguma_dificuldade_motora')->nullable(true);

            $table->string('controle_vesical_bexiga')->nullable(true);
            $table->string('controle_anal_fezes')->nullable(true);
            $table->text('foi_difícil_tranquilo_ou_houve_algum_a_pressao_da_família')->nullable(true);

            $table->string('balbucios')->nullable(true);
            $table->string('quando_comecou_a_falar')->nullable(true);
            $table->string('como_os_pais_reagiram_fala')->nullable(true);
            $table->string('apresentou_problema_na_fala_se_sim_quais')->nullable(true);
            $table->string('compreende_ordens')->nullable(true);
            $table->string('presenca_de_bilinguismo_em_casa')->nullable(true);
            $table->string('como_a_crianca_se_comunica')->nullable(true);
            $table->string('apresenta_salivacao_no_canto_da_boca')->nullable(true);

            $table->string('idade_entrou_na_escola')->nullable(true);
            $table->string('adaptouse_bem')->nullable(true);
            $table->string('metodo_alfabetizacao')->nullable(true);
            $table->string('mudou_de_escola_se_sim_em_qual_serie_e_idade')->nullable(true);
            $table->string('escola_atual')->nullable(true);
            $table->string('metodo_alfabetizacao_atual')->nullable(true);
            $table->string('serie_e_turno')->nullable(true);
            $table->string('professor')->nullable(true);
            $table->string('faz_as_tarefaz_sozinho_se_nao_com_quem_faz')->nullable(true);
            $table->string('descricao_momento_licoes')->nullable(true);
            $table->string('opniao_dos_pais_sobre_escola')->nullable(true);
            $table->string('opniao_dos_pais_sobre_tarefas')->nullable(true);
            $table->string('fato_importante_vida_escolar')->nullable(true);
            $table->text('queixas_frequentes')->nullable(true);
            $table->text('tem_dificuldades_para')->nullable(true);
            $table->string('conhece_tais_coisas')->nullable(true);
            $table->string('apresenta_tiques_se_sim_quais')->nullable(true);
            $table->string('como_pegua_o_lapis')->nullable(true);
            $table->string('forca_da_escrita')->nullable(true);
            $table->text('como_acha_que_surgiu_o_problema_a_que_fatores_atribuem')->nullable(true);
            $table->string('outras_questoes')->nullable(true);
            $table->text('escolas_que_frequentou')->nullable(true);
            $table->string('repetiu_ano_se_sim_qual_e_porque')->nullable(true);
            $table->string('humor_habitual')->nullable(true);
            $table->string('prefere_brincar_sozinho_ou_em_grupos')->nullable(true);
            $table->string('estranha_mudancas_de_ambiente')->nullable(true);
            $table->boolean('adaptase_facilmente_ao_meio')->nullable(true);
        });
    }

    public function down() {
        Schema::dropIfExists('anamnese__gigante__psicopeda__neuro__psicomoto_pt2s');
    }
}
