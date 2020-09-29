<?php

Route::get('teste', function () {
    return 'judo.php';
});


Route::get('{id_paciente}/ver', 'ProfissionalAvaliacaoController@verJudo')->name('.ver');
Route::get('{id_paciente}/criar', 'ProfissionalAvaliacaoController@criarJudo')->name('.criar');
Route::post('salvar', 'ProfissionalAvaliacaoController@salvarJudo')->name('.criar.salvar');
Route::get('{id_paciente}/editar', 'ProfissionalAvaliacaoController@editarJudo')->name('.editar');
Route::post('/editar/salvar', 'ProfissionalAvaliacaoController@salvarEditarJudo')->name('.editar.salvar');
