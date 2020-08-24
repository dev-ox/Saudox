<?php

Route::get('teste', function () {
    return 'terapia_ocupacional.php';
});


Route::get('{id_paciente}/ver', 'ProfissionalAnamneseController@verTerapiaOcupacional')->name('.ver');
Route::get('{id_paciente}/criar', 'ProfissionalAnamneseController@criarTerapiaOcupacional')->name('.criar');
Route::get('{id_paciente}/editar', 'ProfissionalAnamneseController@editarTerapiaOcupacional')->name('.editar');
