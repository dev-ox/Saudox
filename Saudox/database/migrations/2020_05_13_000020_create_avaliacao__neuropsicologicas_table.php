<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliacaoNeuropsicologicasTable extends Migration {

    public function up() {
        Schema::create('avaliacao__neuropsicologicas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->bigInteger('id_paciente')->unsigned();
            $table->bigInteger('id_profissional')->unsigned();
            $table->foreign('id_paciente')->references('id')->on('pacientes');
            $table->foreign('id_profissional')->references('id')->on('profissionals');
            $table->text('queixa_principal');
            $table->string('encaminhado_por');
            $table->text('participantes_durante_anaminese');
            $table->text('descricao_das_funcoes_cognitivas_avaliadas');
            $table->text('testes_neuropsicologicos');
            $table->text('recursos_complementares');
            $table->text('dias_necessarios_para_avaliacao_justificados_se_mais_que_4_dias');
            $table->text('alimentacao_nos_dias_da_avalicao');
            $table->text('sono_nos_dias_da_avalicao');
            $table->text('higiene_nos_dias_da_avalicao');
            $table->text('humor_nos_dias_da_avalicao');
            $table->text('areas_preservadas');
            $table->text('areas_lesionadas');
            $table->longText('anexar_arquivos')->nullable(true);
            $table->text('hipotese_diagnostica');
            $table->dateTime('dia_hora_devolutiva_aos_responsavel');
            $table->text('participantes');
            $table->json('atividades_para_ser_feito_na_clinica');
            $table->json('atividades_para_ser_feito_em_casa');
            $table->string('sugestao_encaminhamento')->nullable(true);
            $table->longText('exames_clinicos_se_houver')->nullable(true);

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
        Schema::dropIfExists('avaliacao__neuropsicologicas');
    }
}
