<?php

// DashBoard
Route::get('/admin', 'AdminController@adminHome')->name('.dashboard');


Route::get('/cadastro', 'AdminController@cadastroProfissional')->name('.cadastro');
Route::post('/salvar_cadastro', 'AdminController@salvarCadastrarProfissional')->name('.salvar.cadastro');

?>
