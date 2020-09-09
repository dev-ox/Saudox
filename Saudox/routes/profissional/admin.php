<?php

// DashBoard
Route::get('/admin', 'AdminController@adminHome')->name('.dashboard');


Route::prefix('cadastro')->name('.cadastro')->group(function () {
    Route::get('/', 'AdminController@cadastroProfissional');
    Route::post('/salvar', 'AdminController@salvarCadastrarProfissional')->name('.salvar');
});


Route::prefix('editar')->name('.editar')->group(function () {
    Route::get('/{id_profissional}', 'AdminController@editarProfissional');
    Route::post('/salvar/', 'AdminController@salvarEditarProfissional')->name('.salvar');
});

?>
