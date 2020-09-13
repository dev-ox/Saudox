<?php

// Como ambos vão ter acesso as rotas, é interessante colocar aqui, pra ser a
// mesma url tanto pro profissional quanto pro paciente, que ai o profissional
// pode marcar e mandar o link pro paciente por exemplo.
Route::middleware('auth:paciente')->group(function(){
    Route::prefix('agendamento')->name('agendamento')->group(function() {
        Route::get('/ver/{id_agendamento}', 'AgendamentosController@verAgendamento')->name('.ver');
    });
});

Route::middleware('auth:profissional')->group(function(){
    Route::prefix('agendamento')->name('agendamento')->group(function() {
        Route::get('/{id_paciente?}', 'AgendamentosController@agendarPaciente')->name('.criar');
        Route::get('/ver/{id_agendamento}', 'AgendamentosController@verAgendamento')->name('.ver');
        Route::get('/editar/{id_agendamento}', 'AgendamentosController@editarAgendamento')->name('.editar');
        Route::get('/concluir/{id_agendamento}', 'AgendamentosController@marcarAgendamentoConcluido')->name('.marcar_concluida');
        Route::post('/salvar', 'AgendamentosController@salvarAgendar')->name('.salvar');
        Route::post('/salvar_editar', 'AgendamentosController@salvarEditarAgendar')->name('.editar.salvar');
    });
});


