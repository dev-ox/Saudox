<?php

Route::get('teste', function () {
    return 'psicopedagogia.php';
});


Route::get('{id_paciente}/ver', 'ProfissionalAnamneseController@verPsicopedagogia')->name('.ver');
Route::get('{id_paciente}/criar', 'ProfissionalAnamneseController@criarPsicopedagogia')->name('.criar');
Route::get('{id_paciente}/editar', 'ProfissionalAnamneseController@editarPsicopedagogia')->name('.editar');
