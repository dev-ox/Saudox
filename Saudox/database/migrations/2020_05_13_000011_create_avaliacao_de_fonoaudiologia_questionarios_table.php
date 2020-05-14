<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliacaoDeFonoaudiologiaQuestionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacao_de_fonoaudiologia_questionarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            /* Tive que diminuir o tamanho da var pq era muito grande */
            /* Era: 'id_avaliacao_fonoaudiologia' */
            $table->bigInteger('ava_fono')->unsigned();
            $table->foreign('ava_fono')->references('id')->on('avaliacao__fonoaudiologias');
            $table->longText('respostas_questionario');
            $table->string('idade_referente_respostas_questionario');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avaliacao_de_fonoaudiologia_questionarios');
    }
}
