<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliacaoFonoaudiologiasTable extends Migration {

    public function up() {
        Schema::create('avaliacao__fonoaudiologias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->bigInteger('id_paciente')->unsigned();
            $table->bigInteger('id_profissional')->unsigned();
            $table->foreign('id_paciente')->references('id')->on('pacientes');
            $table->foreign('id_profissional')->references('id')->on('profissionals');
            $table->string('seletor_questionario');
            $table->text('motivo_avaliacao');
            $table->dateTime('data_avaliacao');

            $table->float('ultima_tarefa_correta_linguagem_receptiva');
            $table->float('menos_total_respostas_incorretoas_linguagem_receptiva');
            $table->float('linguagem_receptiva');

            $table->float('ultima_tarefa_correta_linguagem_expressiva');
            $table->float('menos_total_respostas_incorretoas_linguagem_expressiva');
            $table->float('linguagem_expressiva');

            $table->float('escore_padrao_linguagem_receptiva');
            $table->float('mais_escore_padrao_linguagem_expressiva');
            $table->float('total_linguagem_global');
            $table->float('escore_padrao_linguagem_global');

            $table->text('observacao_comportamento');
            /* $table->unsignedBigInteger('questionario')->nullable(true); Isso é pro futuro... chave estrangeira */
            $table->json('respostas');
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
        Schema::dropIfExists('avaliacao__fonoaudiologias');
    }
}
