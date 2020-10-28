<?php

Route::get('teste', function () {
    return 'psicologica.php';
});


// Retorna o feed de Evolucoes
Route::get('{id_paciente}/ver', 'ProfissionalEvolucaoController@verNeuropsicologia')->name('.ver');
Route::get('{id_paciente}/criar', 'ProfissionalEvolucaoController@criarNeuropsicologia')->name('.criar');
Route::post('salvar', 'ProfissionalEvolucaoController@salvarNeuropsicologia')->name('.salvar');
Route::get('{id_evolucao}/editar', 'ProfissionalEvolucaoController@editarNeuropsicologia')->name('.editar');
Route::post('editar', 'ProfissionalEvolucaoController@salvarEditarNeuropsicologia')->name('.editar.salvar');
