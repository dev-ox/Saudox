<?php

Route::get('teste', function () {
    return 'fonoaudiologia.php';
});


Route::get('{id_paciente}/ver', 'ProfissionalAvaliacaoController@verFonoaudiologia')->name('.ver');
Route::get('{id_paciente}/criar', 'ProfissionalAvaliacaoController@criarFonoaudiologia')->name('.criar');
Route::get('{id_paciente}/editar', 'ProfissionalAvaliacaoController@editarFonoaudiologia')->name('.editar');
