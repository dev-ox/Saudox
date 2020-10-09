<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnamneseGigantePsicopedaNeuroPsicomotoPt3sTable extends Migration {

    public function up() {
        Schema::create('anamnese__pnp__pt3s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->bigInteger('id_tp')->unsigned();
            $table->foreign('id_tp')->references('id')->on('anamnese__gigante__psicopeda__neuro__psicomotos');
            $table->boolean('tem_horarios');
            $table->boolean('e_lider');
            $table->boolean('aceita_bem_ordens');
            $table->boolean('faz_birras');
            $table->boolean('chora_com_frequencia');
            $table->text('de_que_forma_e_punido');
            $table->string('pratica_esportes_se_sim_quais');
            $table->boolean('apresenta_agressividade_apatia_ou_teimosia');
            $table->string('tem_algum_medo_se_sim_quais');
            $table->string('quais_as_brincadeiras_e_brinquedos_favoritos');
            $table->string('quem_cuidava_da_criança_ate_os_tres_anos');
            $table->string('quem_cuida_posteriormente');
            $table->string('como_a_crianca_se_comporta_sozinha');
            $table->string('como_a_crianca_se_comporta_em_familia');
            $table->string('como_a_crianca_se_comporta_com_outras_pessoas');
            $table->string('com_quem_ele_mais_gosta_de_ficar_e_por_que');
            $table->string('em_que_momento_a_crianca_encontra_a_familia');
            $table->string('que_tipos_de_perdas_ja_enfrentou_e_em_que_idade');
            $table->string('ja_houve_conflitos_familiares_e_a_crianca_presencia');
            $table->boolean('assiste_tv_em_demasia');
            $table->text('quais_programas_favoritos');
            $table->text('de_que_forma_o_pai_e_a_mae_se_relacionam_com_a_crianca');
            $table->string('em_que_horario_brincam_ou_fazem_alguma_atividade_de_lazer');
            $table->string('como_se_relaciona_com_irmaos');
            $table->string('como_se_relaciona_com_colegas_e_professores');

            $table->string('apresenta_curiosidade_sexual_se_sim_quando_comecou');
            $table->string('tipos_de_perguntas_fase_sexual');
            $table->string('fase_de_masturbacao');
            $table->string('atitude_da_família');

            $table->string('se_veste_so_a_partir_de_qual_idade');
            $table->string('se_abotoa_so_a_partir_de_qual_idade');
            $table->string('fecha_roupa_so_a_partir_de_qual_idade');
            $table->string('toma_banho_so_a_partir_de_qual_idade');
            $table->string('se_penteia_so_a_partir_de_qual_idade');
            $table->string('se_amarra_so_a_partir_de_qual_idade');
            $table->string('escova_os_dentes_so_a_partir_de_qual_idade');
            $table->string('come_so_a_partir_de_qual_idade');
            $table->string('se_calca_so_a_partir_de_qual_idade');

            $table->boolean('roi_unhas');
            $table->string('tem_tiques_nervosos_se_sim_quais');
            $table->string('alguma_mania_repetitiva_se_sim_qual');
            $table->boolean('tem_movimentos_ritmicos');
            $table->boolean('chupa_dedo_ou_bico');
            $table->string('temObjetoComoCheirinhoOuOutroParaDormirLevarParaEscolaSeSimQual');
            $table->string('outros_habitos')->nullable(true);

            $table->string('como_a_familia_ve_o_problema');
            $table->string('como_o_casal_age_em_funcao_da_crianca');
            $table->text('comoOsPaisSeVeemPermissivosAutoritariosEquilibradosEPorque');
            $table->text('como_sao_colocados_os_limites_para_a_crianca_no_seu_cotidiano');
            $table->string('situacao_economica');
            $table->string('situacao_cultural');
            $table->text('le_quais_livros_com_que_frequência');
            $table->string('vai_ao_cinema_e_com_que_frequencia');
            $table->string('estimulo_cultural_se_sim_quais');
            $table->string('habitos_de_lazer');
            $table->string('constancia_de_dialogos');
            $table->string('fazem_refeicoes_juntos_se_sim_quais');
            $table->string('algum_vício_na_família_se_sim_quais');
            $table->text('estabelece_contato_visual_se_sim_em_quais_situacoes');
            $table->string('imitaAlgumGestoDeEmocaoFamiliaresPessoasProximasSeSimQuais');
            $table->string('imita_algum_som_especifico_se_sim_quais');
            $table->string('mostrase_sonolento_se_sim_com_qual_frequencia');
            $table->boolean('quando_estimulado_consegue_relembrar_de_situacoes_vivenciadas');
            $table->string('com_que_frequencia_ignora_estimulos');
            $table->string('com_que_frequencia_manipula_brinquedos_e_objetos');
            $table->text('ansioso_no_processo_de_mudanca_de_rotina_se_sim_voce_lembra');

            $table->text('analise_da_entrevista');
            $table->text('encaminhamentos');

        });
    }

    public function down() {
        Schema::dropIfExists('anamnese__gigante__psicopeda__neuro__psicomoto_pt3s');
    }
}
