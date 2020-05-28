<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->string('login')->unique();
            $table->string('password');
            $table->string('nome_paciente');
            $table->string('cpf')->unique();
            $table->boolean('sexo');
            $table->date('data_nascimento');
            $table->string('responsavel');
            $table->unsignedInteger('numero_irmaos');
            $table->text('lista_irmaos');
            $table->string('nome_pai');
            $table->string('nome_mae');
            $table->string('telefone_pai');
            $table->string('telefone_mae');
            $table->string('email_pai');
            $table->string('email_mae');
            $table->unsignedInteger('idade_pai');
            $table->unsignedInteger('idade_mae');
            $table->unsignedBigInteger('id_endereco');
            $table->foreign('id_endereco')->references('id')->on('enderecos');
            $table->string('naturalidade');
            $table->boolean('pais_sao_casados');
            $table->boolean('pais_sao_divorciados');
            $table->text('reacao_sobre_a_relacao_pais_caso_divorciados')->nullable(true);
            $table->string('vive_com_quem_caso_pais_divorciados')->nullable(true);
            $table->boolean('tipo_filho_biologico_adotivo');
            $table->boolean('crianca_sabe_se_adotivo')->nullable(true);
            $table->text('reacao_quando_descobriu_se_adotivo')->nullable(true);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
