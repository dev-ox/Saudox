<?php

// TODO: Colocar os 'names' nas rotas de anamnese, avaliacao, evolucao

/*
############## ###- M I D D L E W A R E  - #################
Middleware para verificar se sem alguém logado e esse algué é profissional
ou paciente:
    ->middleware('auth:profissional');
    ->middleware('auth:paciente');

Middleware para permitir quando alguém (qualquer) estiver logado:
    ->middleware('alguemLogado');

Middleware para PERMITIR quando ninguém (qualquer) estiver logado:
    ->middleware('ninguemLogado');

_Para entender melhor, veja as rotas de teste no fim desse arquivo_
*/

Auth::routes();

// Adiciona o profixo para o profissional e um nome para usar como por
// exemplo: 'profissional.home'
// O namespace basicamente indica o local (diretório) dos métodos chamados
Route::prefix('/rofissional')->name('profissional')->namespace('Profissional')->group(function(){

    require 'profissional.php';

});

Route::prefix('paciente')->name('paciente')->group(function(){

    require 'paciente.php';

});

// Logout (Força logout de qualquer tipo de usuario)
Route::get('/logout', 'Auth\LoginController@logout')->name('logout')->middleware('alguemLogado');


Route::get('/', function () {
    return view('welcome');
})->name('padrao');



// ################
// Essas rotas poderão ser apagadas futuramente, são apenas para teste e entendeimento

Route::get('/so_logado', function() {
    return view('so_logado');
})->middleware('alguemLogado');

Route::get('/so_deslogado', function() {
    return view('so_deslogado');
})->middleware('ninguemLogado');
// ################
