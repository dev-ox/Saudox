<?php

Auth::routes();

// Adiciona o profixo para o profissional e um nome para usar como por
// exemplo: 'profissional.home'
// O namespace basicamente indica o local (diretório) dos métodos chamados
Route::prefix('/profissional')->name('profissional.')->namespace('Profissional')->group(function(){
    require 'profissional.php';
});


Route::prefix('anamnese')->group(function () {
    require 'anamnese/anamnese_geral.php';
});

Route::prefix('avaliacao')->group(function () {
    require 'avaliacao/avaliacao_geral.php';
});

Route::prefix('evolucao')->group(function () {
    require 'evolucao/evolucao_geral.php';
});



Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', 'Auth\LoginController@logout');



Route::get('/', function () {
    return view('welcome');
});
