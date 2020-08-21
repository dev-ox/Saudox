<?php

Route::get('teste', function () {
    return 'terapia_ocupacional.php';
});


// Retorna o feed de Evolucoes
Route::get('{id_paciente}/ver', 'ProfissionalEvolucaoController@verTerapiaOcupacional')->name('.ver');
Route::get('{id_paciente}/criar', 'ProfissionalEvolucaoController@criarTerapiaOcupacional')->name('.criar');
Route::get('{id_paciente}/editar', 'ProfissionalEvolucaoController@editarTerapiaOcupacional')->name('.editar');
