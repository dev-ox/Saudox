<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliacaoNeuropsicologicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacao__neuropsicologicas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->bigInteger('id_paciente')->unsigned();
            $table->bigInteger('id_profissional')->unsigned();
            $table->bigInteger('id_anaminese')->unsigned();
            $table->foreign('id_paciente')->references('id')->on('pacientes');
            $table->foreign('id_profissional')->references('id')->on('profissionals');
            $table->foreign('id_anaminese')->references('id')->on('anamnese__psicopeda__neuro__psicomotos');
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
            $table->binary('anexar arquivos')->nullable(true);
            $table->text('hipotese_diagnostica');
            $table->dateTime('dia_hora_devolutiva_aos_responsavel');
            $table->text('participantes');
            $table->json('atividades_para_ser_feito_na_clinica');
            $table->json('atividades_para_ser_feito_em_casa');
            $table->string('sugestao_encaminhamento')->nullable(true);
            $table->binary('exames_clinicos_se_houver')->nullable(true);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avaliacao__neuropsicologicas');
    }
}
