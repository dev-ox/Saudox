<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliacaoJudosTable extends Migration {

    public function up() {
        Schema::create('avaliacao__judos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->bigInteger('id_paciente')->unsigned();
            $table->foreign('id_paciente')->references('id')->on('pacientes');
            $table->bigInteger('id_profissional')->unsigned();
            $table->foreign('id_profissional')->references('id')->on('profissionals');
            $table->text('diagnostico');
            $table->string('relacao_com_as_pessoas_judo');
            $table->string('resposta_emocional');
            $table->string('uso_do_corpo');
            $table->string('uso_de_objetos');
            $table->string('adaptacao_a_mudancas');
            $table->string('resposta_auditiva');
            $table->string('resposta_visual');
            $table->string('medo_ou_nervosismo');
            $table->string('comunicacao_verbal');
            $table->string('comunicacao_nao_verbal');
            $table->string('orienta_se_por_som');
            $table->string('reacao_ao_nao');
            $table->string('compreendem_comandos_simples_palavras_que_descrevam_objetos');
            $table->string('manipula_brinquedos_objetos');
            $table->string('equilibrio');
            $table->string('forca');
            $table->string('resistencia');
            $table->string('marcha');
            $table->string('agilidade');
            $table->string('coordenacao_motora_fina');
            $table->string('coordenacao_motora_grossa');
            $table->string('propriocepcao');
            $table->string('compreende_direcoes');
            $table->string('compreende_comandos_professoras');
            $table->string('concentracao');
            $table->string('comportamento_reflexo');
            $table->text('observacoes');
            $table->text('terapias');
            $table->string('objetivos');
            $table->string('tipo_da_aula');
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
        Schema::dropIfExists('avaliacao__judos');
    }
}
