<?php

Route::get('teste', function () {
    return 'terapia_ocupacional.php';
});


Route::get('{id_paciente}/ver', 'ProfissionalAnamneseController@verTerapiaOcupacional')->name('.ver');
Route::get('{id_paciente}/criar', 'ProfissionalAnamneseController@criarTerapiaOcupacional')->name('.criar');
Route::post('/salvar', 'ProfissionalAnamneseController@salvarTerapiaOcupacional')->name('.salvar');
Route::get('{id_paciente}/editar', 'ProfissionalAnamneseController@editarTerapiaOcupacional')->name('.editar');
Route::post('/salvar_editar', 'ProfissionalAnamneseController@salvarEditarTerapiaOcupacional')->name('.salvar_editar');
