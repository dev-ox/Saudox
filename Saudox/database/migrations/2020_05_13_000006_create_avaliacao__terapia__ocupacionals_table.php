<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliacaoTerapiaOcupacionalsTable extends Migration {

    public function up() {
        Schema::create('avaliacao__terapia__ocupacionals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->bigInteger('id_paciente')->unsigned();
            $table->bigInteger('id_profissional')->unsigned();
            $table->foreign('id_paciente')->references('id')->on('pacientes');
            $table->foreign('id_profissional')->references('id')->on('profissionals');
            $table->dateTime('data_avaliacao');
            $table->string('entrevistado');
            $table->text('queixa_principal');
            $table->string('brincadeiras_favoritas');
            $table->string('onde_brinca');
            $table->string('com_quem_prefere_brincar');
            $table->string('o_que_faz_rir');
            $table->string('brincadeiras_evitadas');
            $table->string('brinca_sozinho_ou_precisa_de_atencao');
            $table->string('postura_crianca_quando_brinca');
            $table->string('reacao_ao_ser_frustrada_ou_raiva');
            $table->string('quem_disciplina_a_crianca');
            $table->string('como_reage_a_orientacao_dos_pais');
            $table->string('reacao_a_abracos_carinhos');
            $table->string('areas_maior_habilidade');
            $table->string('areas_maior_dificuldade');
            $table->string('hora_de_levantar');
            $table->string('hora_cafe_da_manha');
            $table->string('hora_da_escola');
            $table->string('hora_almoco');
            $table->string('hora_janta');
            $table->string('hora_dormir');
            $table->boolean('dorme_durante_dia')->default(false);
            $table->boolean('dorme_com_facilidade')->default(false);
            $table->boolean('sono_tranqulo')->default(false);
            $table->string('acorda_noite');
            $table->boolean('pesadelos')->default(false);
            $table->boolean('sonambulismo')->default(false);
            $table->boolean('rola_balanca_cabeca_enquanto_dorme')->default(false);
            $table->boolean('come_com_os_dedos')->default(false);
            $table->boolean('come_com_talheres')->default(false);
            $table->boolean('brinca_com_comida')->default(false);
            $table->boolean('derrama_comida')->default(false);
            $table->boolean('usa_mao_direita_para_comer')->default(false);
            $table->boolean('bebe_em_garrafa')->default(false);
            $table->boolean('usa_canudo')->default(false);
            $table->string('segura_copo_garrafa_com_uma_ou_duas_maos');
            $table->boolean('ajuda_a_colocar_a_mesa')->default(false);
            $table->string('tipo_alimentacao');
            $table->boolean('tem_bom_apetite')->default(false);
            $table->string('o_que_gosta_de_comer');
            $table->string('nao_gosta_de_comer');
            $table->boolean('houve_dificuldade_transicao_pastoso_solido')->default(false);
            $table->string('gosta_de_vestir_roupa');
            $table->string('veste_roupa_sozinho_quais_pecas');
            $table->string('tira_roupa_sozinho_quais_pecas');
            $table->boolean('abotoa')->default(false);
            $table->boolean('amarra')->default(false);
            $table->boolean('usa_fralda')->default(false);
            $table->boolean('usa_vaso_sanitario')->default(false);
            $table->boolean('lava_maos_face_corpo')->default(false);
            $table->boolean('escova_dentes')->default(false);
            $table->boolean('se_diverte_com_o_banho')->default(false);
            $table->boolean('gosta_molhar_cabeca')->default(false);
            $table->boolean('enxuga_se')->default(false);
            $table->boolean('gosta_pentear_cabelos')->default(false);
            $table->boolean('gosta_cortar_cabelos')->default(false);
            $table->boolean('gosta_cortar_unhas')->default(false);
            $table->text('info_extras_relevante')->nullable(true);
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
        Schema::dropIfExists('avaliacao__terapia__ocupacionals');
    }
}
