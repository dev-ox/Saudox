<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnamneseGigantePsicopedaNeuroPsicomotosTable extends Migration {

    public function up() {
        Schema::create('anamnese__gigante__psicopeda__neuro__psicomotos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('anamnese__gigante__psicopeda__neuro__psicomotos');
        Schema::dropIfExists('anamnese__psicopeda__neuro__psicomotos');
    }
}
