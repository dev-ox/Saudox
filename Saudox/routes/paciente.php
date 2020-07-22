<?php

Route::middleware('auth:paciente')->group(function() {

	Route::get('/home', 'HomeController@index')->name('.home');

	Route::prefix('anamnese')->name('.anamnese')->group(function () {
        require 'paciente/anamnese/anamnese_geral.php';
    });

    Route::prefix('avaliacao')->name('.avaliacao')->group(function () {
        require 'paciente/avaliacao/avaliacao_geral.php';
    });

    Route::prefix('evolucao')->name('.evolucao')->group(function () {
        require 'paciente/evolucao/evolucao_geral.php';
    });

});

Route::get('/logout', 'Auth\LoginController@logout')->name('.logout')->middleware('alguemLogado');
