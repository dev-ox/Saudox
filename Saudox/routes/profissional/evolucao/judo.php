<?php

Route::get('teste', function () {
    return 'judo.php';
});


// Retorna o feed de Evolucoes
Route::get('{id_paciente}/ver', 'ProfissionalEvolucaoController@verJudo')->name('.ver');
Route::get('{id_paciente}/criar', 'ProfissionalEvolucaoController@criarJudo')->name('.criar');
Route::get('{id_paciente}/editar', 'ProfissionalEvolucaoController@editarJudo')->name('.editar');
