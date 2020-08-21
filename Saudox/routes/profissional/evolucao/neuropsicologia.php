<?php

Route::get('teste', function () {
    return 'psicologica.php';
});


// Retorna o feed de Evolucoes
Route::get('{id_paciente}/ver', 'ProfissionalEvolucaoController@verNeuropsicologia')->name('.ver');
Route::get('{id_paciente}/criar', 'ProfissionalEvolucaoController@criarNeuropsicologia')->name('.criar');
Route::get('{id_paciente}/editar', 'ProfissionalEvolucaoController@editarNeuropsicologia')->name('.editar');
