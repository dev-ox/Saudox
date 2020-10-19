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
            $table->boolean('tem_horarios')->nullable(true);
            $table->boolean('e_lider')->nullable(true);
            $table->boolean('aceita_bem_ordens')->nullable(true);
            $table->boolean('faz_birras')->nullable(true);
            $table->boolean('chora_com_frequencia')->nullable(true);
            $table->text('de_que_forma_e_punido')->nullable(true);
            $table->string('pratica_esportes_se_sim_quais')->nullable(true);
            $table->boolean('apresenta_agressividade_apatia_ou_teimosia')->nullable(true);
            $table->string('tem_algum_medo_se_sim_quais')->nullable(true);
            $table->string('quais_as_brincadeiras_e_brinquedos_favoritos')->nullable(true);
            $table->string('quem_cuidava_da_criança_ate_os_tres_anos')->nullable(true);
            $table->string('quem_cuida_posteriormente')->nullable(true);
            $table->string('como_a_crianca_se_comporta_sozinha')->nullable(true);
            $table->string('como_a_crianca_se_comporta_em_familia')->nullable(true);
            $table->string('como_a_crianca_se_comporta_com_outras_pessoas')->nullable(true);
            $table->string('com_quem_ele_mais_gosta_de_ficar_e_por_que')->nullable(true);
            $table->string('em_que_momento_a_crianca_encontra_a_familia')->nullable(true);
            $table->string('que_tipos_de_perdas_ja_enfrentou_e_em_que_idade')->nullable(true);
            $table->string('ja_houve_conflitos_familiares_e_a_crianca_presencia')->nullable(true);
            $table->boolean('assiste_tv_em_demasia')->nullable(true);
            $table->text('quais_programas_favoritos')->nullable(true);
            $table->text('de_que_forma_o_pai_e_a_mae_se_relacionam_com_a_crianca')->nullable(true);
            $table->string('em_que_horario_brincam_ou_fazem_alguma_atividade_de_lazer')->nullable(true);
            $table->string('como_se_relaciona_com_irmaos')->nullable(true);
            $table->string('como_se_relaciona_com_colegas_e_professores')->nullable(true);

            $table->string('apresenta_curiosidade_sexual_se_sim_quando_comecou')->nullable(true);
            $table->string('tipos_de_perguntas_fase_sexual')->nullable(true);
            $table->string('fase_de_masturbacao')->nullable(true);
            $table->string('atitude_da_família')->nullable(true);

            $table->string('se_veste_so_a_partir_de_qual_idade')->nullable(true);
            $table->string('se_abotoa_so_a_partir_de_qual_idade')->nullable(true);
            $table->string('fecha_roupa_so_a_partir_de_qual_idade')->nullable(true);
            $table->string('toma_banho_so_a_partir_de_qual_idade')->nullable(true);
            $table->string('se_penteia_so_a_partir_de_qual_idade')->nullable(true);
            $table->string('se_amarra_so_a_partir_de_qual_idade')->nullable(true);
            $table->string('escova_os_dentes_so_a_partir_de_qual_idade')->nullable(true);
            $table->string('come_so_a_partir_de_qual_idade')->nullable(true);
            $table->string('se_calca_so_a_partir_de_qual_idade')->nullable(true);

            $table->boolean('roi_unhas')->nullable(true);
            $table->string('tem_tiques_nervosos_se_sim_quais')->nullable(true);
            $table->string('alguma_mania_repetitiva_se_sim_qual')->nullable(true);
            $table->boolean('tem_movimentos_ritmicos')->nullable(true);
            $table->boolean('chupa_dedo_ou_bico')->nullable(true);
            $table->string('temObjetoComoCheirinhoOuOutroParaDormirLevarParaEscolaSeSimQual')->nullable(true);
            $table->string('outros_habitos')->nullable(true)->nullable(true);

            $table->string('como_a_familia_ve_o_problema')->nullable(true);
            $table->string('como_o_casal_age_em_funcao_da_crianca')->nullable(true);
            $table->text('comoOsPaisSeVeemPermissivosAutoritariosEquilibradosEPorque')->nullable(true);
            $table->text('como_sao_colocados_os_limites_para_a_crianca_no_seu_cotidiano')->nullable(true);
            $table->string('situacao_economica')->nullable(true);
            $table->string('situacao_cultural')->nullable(true);
            $table->text('le_quais_livros_com_que_frequência')->nullable(true);
            $table->string('vai_ao_cinema_e_com_que_frequencia')->nullable(true);
            $table->string('estimulo_cultural_se_sim_quais')->nullable(true);
            $table->string('habitos_de_lazer')->nullable(true);
            $table->string('constancia_de_dialogos')->nullable(true);
            $table->string('fazem_refeicoes_juntos_se_sim_quais')->nullable(true);
            $table->string('algum_vício_na_família_se_sim_quais')->nullable(true);
            $table->text('estabelece_contato_visual_se_sim_em_quais_situacoes')->nullable(true);
            $table->string('imitaAlgumGestoDeEmocaoFamiliaresPessoasProximasSeSimQuais')->nullable(true);
            $table->string('imita_algum_som_especifico_se_sim_quais')->nullable(true);
            $table->string('mostrase_sonolento_se_sim_com_qual_frequencia')->nullable(true);
            $table->boolean('quando_estimulado_consegue_relembrar_de_situacoes_vivenciadas')->nullable(true);
            $table->string('com_que_frequencia_ignora_estimulos')->nullable(true);
            $table->string('com_que_frequencia_manipula_brinquedos_e_objetos')->nullable(true);
            $table->text('ansioso_no_processo_de_mudanca_de_rotina_se_sim_voce_lembra')->nullable(true);

            $table->text('analise_da_entrevista')->nullable(true);
            $table->text('encaminhamentos')->nullable(true);

        });
    }

    public function down() {
        Schema::dropIfExists('anamnese__gigante__psicopeda__neuro__psicomoto_pt3s');
    }
}
