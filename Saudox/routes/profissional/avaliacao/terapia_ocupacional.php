<?php

Route::get('teste', function () {
    return 'terapia_ocupacional.php';
});


Route::get('{id_paciente}/ver', 'ProfissionalAvaliacaoController@verTerapiaOcupacional')->name('.ver');
Route::get('{id_paciente}/criar', 'ProfissionalAvaliacaoController@criarTerapiaOcupacional')->name('.criar');
Route::post('salvar', 'ProfissionalAvaliacaoController@salvarTerapiaOcupacional')->name('.criar.salvar');
Route::get('{id_paciente}/editar', 'ProfissionalAvaliacaoController@editarTerapiaOcupacional')->name('.editar');
Route::post('/editar/salvar', 'ProfissionalAvaliacaoController@salvarEditarTerapiaOcupacional')->name('.editar.salvar');
