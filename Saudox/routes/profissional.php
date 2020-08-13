<?php

// Dentro do namespace (diretorio) Auth
Route::namespace('Auth')->group(function(){

    Route::middleware('auth:profissional')->group(function() {
        Route::any('/logout','LoginController@logout')->name('.logout');
        Route::any('/logout','LoginController@logout')->name('.logout');
    });

    Route::middleware('ninguemLogado')->group(function() {
        //Login Routes
        Route::get('/login','LoginController@showLoginForm')->name('.login')->middleware('ninguemLogado');
        Route::post('/login','LoginController@login')->name('.efetuarLogin')->middleware('ninguemLogado');

        // TODO: Pensar bem em como vai fazer isso
        Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('.password.request');
        Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('.password.email');

        // TODO: Pensar bem em como vai fazer isso
        //Reset Password Routes
        Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('.password.reset');
        Route::post('/password/reset','ResetPasswordController@reset')->name('.password.update');
    });

});

// TODO: Colocar aqui as rotas que precisam de autenticação do profissional
Route::middleware('auth:profissional')->group(function() {

    Route::get('/home','HomeController@index')->name('.home');

    Route::prefix('anamnese')->name('.anamnese')->group(function () {
        require 'profissional/anamnese/anamnese_geral.php';
    });

    Route::prefix('avaliacao')->name('.avaliacao')->group(function () {
        require 'profissional/avaliacao/avaliacao_geral.php';
    });

    Route::prefix('evolucao')->name('.evolucao')->group(function () {
        require 'profissional/evolucao/evolucao_geral.php';
    });

});
