<?php

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

Middleware para permitir apenas usuário logado é profissional e tem como profissão ser admin:
    ->middleware('ehadmin')

_Para entender melhor, veja as rotas de teste no fim desse arquivo_
*/

Auth::routes();

// Adiciona o prefixo (/algo) para o profissional e um nome para usar como por
// exemplo: 'profissional.home'
// O namespace basicamente indica o local (diretório) dos métodos chamados
Route::prefix('/profissional')->name('profissional')->namespace('Profissional')->group(function(){
    require 'profissional/profissional.php';
});

// Adiciona o prefixo para o paciente e carrega as rotas do mesmo
Route::prefix('paciente')->name('paciente')->group(function(){
    require 'paciente/paciente.php';
});



// Como ambos vão ter acesso as rotas, é interessante colocar aqui, pra ser a
// mesma url tanto pro profissional quanto pro paciente, que ai o profissional
// pode marcar e mandar o link pro paciente por exemplo.
Route::middleware('auth:paciente')->group(function(){
    Route::prefix('agendamento')->name('agendamento')->group(function() {
        Route::get('/ver/{id_agendamento}', 'AgendamentosController@verAgendamentoPaciente')->name('.ver');
    });
});

Route::middleware('auth:profissional')->group(function(){
    Route::prefix('agendamento')->name('agendamento')->group(function() {
        Route::get('/{id_paciente?}', 'AgendamentosController@agendarPaciente')->name('.criar');
        Route::get('/ver/{id_agendamento}', 'AgendamentosController@verAgendamentoPaciente')->name('.ver');
        Route::get('/editar/{id_agendamento}', 'AgendamentosController@editarAgendamentoPaciente')->name('.editar');
        Route::get('/concluir/{id_agendamento}', 'AgendamentosController@marcarAgendamentoConcluido')->name('.marcar_concluida');
        Route::post('/salvar', 'AgendamentosController@salvarAgendarPaciente')->name('.salvar');
        Route::post('/salvar_editar', 'AgendamentosController@salvarEditarAgendarPaciente')->name('.editar.salvar');
    });
});





// Logout (Força logout de qualquer tipo de usuario)
Route::get('/logout', 'Auth\LoginController@logout')->name('logout')->middleware('alguemLogado');

// Tela de erro (chamada: route('erro', ['msg_erro' => 'blablabla']))
Route::get('/erro', 'HomeController@mostrarErro')->name('erro');

Route::get('/', 'HomeController@home')->name('home');
