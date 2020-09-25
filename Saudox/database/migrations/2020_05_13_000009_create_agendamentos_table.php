<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendamentosTable extends Migration {

    public function up() {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->bigInteger('id_convenio')->unsigned()->nullable(true);
            $table->foreign('id_convenio')->references('id')->on('convenios');
            $table->bigInteger('id_profissional')->unsigned();
            $table->foreign('id_profissional')->references('id')->on('profissionals');
            $table->string('nome');
            $table->string('cpf');
            $table->date('data_nascimento_paciente');
            $table->string('telefone');
            $table->string('email')->nullable(true);
            $table->bigInteger('id_endereco')->unsigned();
            $table->foreign('id_endereco')->references('id')->on('enderecos');
            $table->dateTime('data_entrada');
            $table->dateTime('data_saida');
            $table->string('local_de_atendimento');
            // Se é a primeira vez ou não
            $table->boolean('recorrencia_do_agendamento');
            $table->string('tipo_da_recorrencia')->nullable(true);
            $table->text('observacoes')->nullable(true);
            // O agendamento está ativo ou desativo
            // (caso tenha sido concluído, cancelado...)
            $table->boolean('status');
        });
    }

    public function down() {
        Schema::dropIfExists('agendamentos');
    }
}
