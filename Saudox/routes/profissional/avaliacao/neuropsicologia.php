<?php

Route::get('teste', function () {
    return 'neuropsicologia.php';
});


Route::get('{id_paciente}/ver', 'ProfissionalAvaliacaoController@verNeuropsicologia')->name('.ver');
Route::get('{id_paciente}/criar', 'ProfissionalAvaliacaoController@criarNeuropsicologia')->name('.criar');
Route::get('{id_paciente}/editar', 'ProfissionalAvaliacaoController@editarNeuropsicologia')->name('.editar');
