<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConveniosTable extends Migration {

    public function up() {
        Schema::create('convenios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->string('nome_convenio');
            $table->unsignedInteger('numero_convenio');

        });
    }

    public function down() {
        Schema::dropIfExists('convenios');
    }
}
