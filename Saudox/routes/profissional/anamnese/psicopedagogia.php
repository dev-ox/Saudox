<?php

Route::get('teste', function () {
    return 'psicopedagogia.php';
});


Route::get('{id_paciente}/ver', 'ProfissionalAnamneseController@verPsicopedagogia')->name('.ver');
Route::get('{id_paciente}/criar', 'ProfissionalAnamneseController@criarPsicopedagogia')->name('.criar');
Route::post('/salvar', 'ProfissionalAnamneseController@salvarPsicopedagogia')->name('.criar.salvar');
Route::get('{id_paciente}/editar', 'ProfissionalAnamneseController@editarPsicopedagogia')->name('.editar');
Route::post('editar/salvar', 'ProfissionalAnamneseController@salvarEditarPsicopedagogia')->name('.editar.salvar');
