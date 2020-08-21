<?php

Route::get('teste', function () {
    return 'fonoaudiologia.php';
});


// Retorna o feed de Evolucoes
Route::get('{id_paciente}/ver', 'ProfissionalEvolucaoController@verFonoaudiologia')->name('.ver');
Route::get('{id_paciente}/criar', 'ProfissionalEvolucaoController@criarFonoaudiologia')->name('.criar');
Route::get('{id_paciente}/editar', 'ProfissionalEvolucaoController@editarFonoaudiologia')->name('.editar');
