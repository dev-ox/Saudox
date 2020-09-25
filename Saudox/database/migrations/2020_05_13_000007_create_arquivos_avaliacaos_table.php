<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArquivosAvaliacaosTable extends Migration {

    public function up() {
        Schema::create('arquivos_avaliacaos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->string('tipo_da_avaliacao');
            $table->unsignedInteger('id_da_avaliacao');
            $table->longText('arquivo');
        });
    }

    public function down() {
        Schema::dropIfExists('arquivos_avaliacaos');
    }
}
