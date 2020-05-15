<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliacaoFonoaudiologiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacao__fonoaudiologias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->bigInteger('id_paciente')->unsigned();
            $table->bigInteger('id_profissional')->unsigned();
            $table->foreign('id_paciente')->references('id')->on('pacientes');
            $table->foreign('id_profissional')->references('id')->on('profissionals');
            $table->text('motivo_avaliacao');
            $table->dateTime('data_avaliacao');
            $table->float('ultima_tarefa_correta_linguagem_receptiva');
            $table->float('menos_total_respostas_incorretoas_linguagem_receptiva');
            $table->float('linguagem_receptiva');
            $table->float('ultima_tarefa_correta_linguagem_expressiva');
            $table->float('menos_total_respostas_incorretoas_linguagem_expressiva');
            $table->float('linguagem_expressiva');
            $table->float('ultima_tarefa_correta_linguagem_global');
            $table->float('menos_total_respostas_incorretoas_linguagem_global');
            $table->float('linguagem_global');
            $table->text('observacao_comportamento');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avaliacao__fonoaudiologias');
    }
}
