<?php

Route::get('teste', function () {
    return 'fonoaudiologia.php';
});


Route::get('{id_paciente}/ver', 'ProfissionalAvaliacaoController@verFonoaudiologia')->name('.ver');
Route::get('{id_paciente}/criar', 'ProfissionalAvaliacaoController@criarFonoaudiologia')->name('.criar');
Route::post('salvar', 'ProfissionalAvaliacaoController@salvarFonoaudiologia')->name('.criar.salvar');
Route::get('{id_paciente}/editar', 'ProfissionalAvaliacaoController@editarFonoaudiologia')->name('.editar');
Route::post('editar/salvar', 'ProfissionalAvaliacaoController@salvarEditarFonoaudiologia')->name('.editar.salvar');
