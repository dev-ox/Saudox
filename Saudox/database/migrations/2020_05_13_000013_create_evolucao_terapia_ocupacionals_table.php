<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvolucaoTerapiaOcupacionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evolucao_terapia_ocupacionals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->bigInteger('id_paciente')->unsigned();
            $table->bigInteger('id_profissional')->unsigned();
            $table->bigInteger('id_evolucao_anterior')->unsigned()->nullable(true);
            $table->foreign('id_paciente')->references('id')->on('pacientes');
            $table->foreign('id_profissional')->references('id')->on('profissionals');
            $table->foreign('id_evolucao_anterior')->references('id')->on('evolucao_terapia_ocupacionals')->nullable(true);
            $table->dateTime('data_evolucao');
            $table->longText('texto');
            $table->text('obs_importante')->default("Nenhuma observação.");

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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evolucao_terapia_ocupacionals');
    }
}
