<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvolucaoFonoaudiologiasTable extends Migration {

    public function up() {
        Schema::create('evolucao_fonoaudiologias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->bigInteger('id_paciente')->unsigned();
            $table->bigInteger('id_profissional')->unsigned();
            $table->bigInteger('id_evolucao_anterior')->unsigned()->nullable(true);
            $table->foreign('id_paciente')->references('id')->on('pacientes');
            $table->foreign('id_profissional')->references('id')->on('profissionals');
            $table->foreign('id_evolucao_anterior')->references('id')->on('evolucao_fonoaudiologias')->nullable(true);
            $table->dateTime('data_evolucao');
            $table->string('processo_perceptual_visualizacao');
            $table->boolean('melhora_processo_perceptual_visualizacao');
            $table->boolean('dificuldade_mantida_no_processo_perceptual_vizualizacao');
            $table->string('processo_perceptual_audibilizacao');
            $table->boolean('melhora_processo_perceptual_audibilizacao');
            $table->boolean('dificuldade_mantida_processo_perceptual_audibilizacao');
            $table->string('funcoes_basicas_linguagem_cor');
            $table->boolean('melhora_funcoes_basicas_linguagem_cor');
            $table->boolean('dificuldade_mantida_funcoes_basicas_linguagem_cor');
            $table->string('funcoes_basicas_linguagem_forma');
            $table->boolean('melhora_funcoes_basicas_linguagem_forma');
            $table->boolean('dificuldade_mantida_funcoes_basicas_linguagem_forma');
            $table->string('funcoes_basicas_linguagem_tamanho');
            $table->boolean('melhora_funcoes_basicas_linguagem_tamanho');
            $table->boolean('dificuldade_mantida_funcoes_basicas_linguagem_tamanho');
            $table->string('funcoes_basicas_linguagem_espaco');
            $table->boolean('melhora_funcoes_basicas_linguagem_espaco');
            $table->boolean('dificuldade_mantida_funcoes_basicas_linguagem_espaco');
            $table->string('funcoes_basicas_linguagem_igual_diferente');
            $table->boolean('melhora_funcoes_basicas_linguagem_igual_diferente');
            $table->boolean('dificuldade_mantida_funcoes_basicas_linguagem_igual_diferente');
            $table->string('funcoes_basicas_linguagem_esquerda_direita');
            $table->boolean('melhora_funcoes_basicas_linguagem_esquerda_direita');
            $table->boolean('dificuldade_mantida_funcoes_basicas_linguagem_esquerda_direita');
            $table->string('funcoes_basicas_linguagem_esquema_corporal');
            $table->boolean('melhora_funcoes_basicas_linguagem_esquema_corporal');
            $table->boolean('dificuldade_mantida_funcoes_basicas_linguagem_esquema_corporal');
            $table->string('funcoes_basicas_linguagem_dominancia_lateral');
            $table->boolean('melhora_funcoes_basicas_linguagem_dominancia_lateral');
            $table->boolean('dificuldade_mantida_funcoes_basicas_linguagem_dominancia_lateral');
            $table->string('resolucao_problemas');
            $table->boolean('melhora_resolucao_problemas');
            $table->boolean('dificuldade_mantida_resolucao_problemas');
            $table->string('compreensao_ordens');
            $table->boolean('melhora_compreensao_ordens');
            $table->boolean('dificuldade_mantida_compreensao_ordens');
            $table->string('memoria_imediata_auditiva');
            $table->boolean('melhora_memoria_imediata_auditiva');
            $table->boolean('dificuldade_mantida_memoria_imediata_auditiva');
            $table->string('memoria_mediativa_auditiva');
            $table->boolean('melhora_memoria_mediativa_auditiva');
            $table->boolean('dificuldade_mantida_memoria_mediativa_auditiva');
            $table->string('memoria_imediata_visual');
            $table->boolean('melhora_memoria_imediata_visual');
            $table->boolean('dificuldade_mantida_memoria_imediata_visual');
            $table->string('memoria_mediativa_visual');
            $table->boolean('melhora_memoria_mediativa_visual');
            $table->boolean('dificuldade_mantida_memoria_mediativa_visual');
            $table->string('habilidades_comunicativas');
            $table->boolean('melhora_habilidades_comunicativas');
            $table->boolean('dificuldade_mantida_habilidades_comunicativas');
            $table->string('comunicacao_oral_sintatico_semantica');
            $table->boolean('melhora_comunicacao_oral_sintatico_semantica');
            $table->boolean('dificuldade_mantida_comunicacao_oral_sintatico_semantica');
            $table->string('comunicacao_oral_articulacao');
            $table->boolean('melhora_comunicacao_oral_articulacao');
            $table->boolean('dificuldade_mantida_comunicacao_oral_articulacao');
            $table->string('comunicacao_oral_fluencia');
            $table->boolean('melhora_comunicacao_oral_fluencia');
            $table->boolean('dificuldade_mantida_comunicacao_oral_fluencia');
            $table->string('comunicacao_oral_voz');
            $table->boolean('melhora_comunicacao_oral_voz');
            $table->boolean('dificuldade_mantida_comunicacao_oral_voz');
            $table->string('linguagem');
            $table->boolean('melhora_linguagem');
            $table->boolean('dificuldade_mantida_linguagem');

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
        Schema::dropIfExists('evolucao_fonoaudiologias');
    }
}
