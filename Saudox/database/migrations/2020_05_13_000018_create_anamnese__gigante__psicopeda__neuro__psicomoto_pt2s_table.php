<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnamneseGigantePsicopedaNeuroPsicomotoPt2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anamnese__pnp__pt2s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->bigInteger('id_tp')->unsigned();
            $table->foreign('id_tp')->references('id')->on('anamnese__gigante__psicopeda__neuro__psicomotos');
            $table->string('teve_otite_infancia');
            $table->string('teve_adenoides_infancia');
            $table->string('teve_amigdalites_infancia');
            $table->string('teve_alergias_infancia');
            $table->string('teve_acidentes_infancia');
            $table->string('teve_convulsoes_infancia');
            $table->string('teve_febres_infancia');
            $table->string('foi_internado_se_sim_por_quanto_tempo');
            $table->text('ja_fez_cirurgia_se_sim_com_quantos_anos_e_qual_cirugia');
            $table->boolean('quedas_e_traumatismos');
            $table->string('teve_complicacao_com_vacina_se_sim_qual');
            $table->string('audicao_e_visao');
            $table->boolean('usa_oculos');
            $table->boolean('se_usa_oculos_leva_para_escola')->nullable(true);
            $table->text('sono_tranquilo_se_for_agitado_quando_e_qual_frequencia');
            $table->boolean('range_dentes');
            $table->boolean('terror_noturno');
            $table->boolean('sonambulistmo');
            $table->boolean('enurese');
            $table->boolean('fala_durante_sono');
            $table->text('dorme_so_se_nao_com_quem_dorme');
            $table->string('ate_quando_dormiu_com_os_pais');
            $table->string('como_foi_a_separacao_dormida_com_os_pais')->nullable(true);
            $table->string('habitos_especiais_sono');
            $table->string('com_que_idade_sustentou_a_cabeca');
            $table->string('com_que_idade_sentou');
            $table->string('com_que_idade_engatinhou');
            $table->string('forma_de_engatinhar');
            $table->string('com_que_idade_comecou_a_andar');
            $table->string('caia_muito');
            $table->string('deixa_cair_as_coisas');
            $table->string('esbarra_muito');
            $table->string('acredita_que_apresenta_alguma_dificuldade_motora');
            $table->string('controle_vesical_bexiga');
            $table->string('controle_anal_fezes');
            $table->text('foi_difícil_tranquilo_ou_houve_algum_a_pressao_da_família');
            $table->string('balbucios');
            $table->string('quando_comecou_a_falar');
            $table->string('como_os_pais_reagiram_fala');
            $table->string('apresentou_problema_na_fala_se_sim_quais');
            $table->string('compreende_ordens');
            $table->string('presenca_de_bilinguismo_em_casa');
            $table->string('como_a_crianca_se_comunica');
            $table->string('apresenta_salivacao_no_canto_da_boca');
            $table->string('idade_entrou_na_escola');
            $table->string('adaptouse_bem');
            $table->string('metodo_alfabetizacao');
            $table->string('mudou_de_escola_se_sim_em_qual_serie_e_idade');
            $table->string('escola_atual')->nullable(true);
            $table->string('metodo_alfabetizacao_atual')->nullable(true);
            $table->string('serie')->nullable(true);
            $table->string('turno')->nullable(true);
            $table->string('professor')->nullable(true);
            $table->string('faz_as_tarefaz_sozinho_se_nao_com_quem_faz')->nullable(true);
            $table->string('descricao_momento_licoes')->nullable(true);
            $table->string('opniao_paterna_sobre_escola')->nullable(true);
            $table->string('opniao_materna_sobre_tarefas')->nullable(true);
            $table->string('fato_importante_vida_escolar')->nullable(true);
            $table->text('queixas_frequentes');
            $table->text('tem_dificuldades_para');
            $table->string('conhece_tais_coisas');
            $table->string('apresenta_tiques_se_sim_quais');
            $table->string('como_pegua_o_lapis');
            $table->string('forca_da_escrita');
            $table->text('como_acha_que_surgiu_o_problema_a_que_fatores_atribuem');
            $table->string('outras_questoes')->nullable(true);
            $table->text('escolas_que_frequentou')->nullable(true);
            $table->string('repetiu_ano_se_sim_qual_e_porque')->nullable(true);
            $table->string('humor_habitual');
            $table->string('prefere_brincar_sozinho_ou_em_grupos');
            $table->string('estranha_mudancas_de_ambiente');
            $table->boolean('adaptase_facilmente_ao_meio');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anamnese__gigante__psicopeda__neuro__psicomoto_pt2s');
    }
}
