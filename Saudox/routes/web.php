<?php

Route::get('/', function () {
    return view('welcome');
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

// Adiciona o profixo para o profissional e um nome para usar como por
// exemplo: 'profissional.home'
// O namespace basicamente indica o local (diretório) dos métodos chamados
Route::prefix('/profissional')->name('profissional.')->namespace('Profissional')->group(function(){

    Route::namespace('Auth')->group(function(){

        //Login Routes
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login');
        Route::post('/logout','LoginController@logout')->name('logout');

        // TODO: Pensar bem em como vai fazer isso
        Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');


        // TODO: Pensar bem em como vai fazer isso
        //Reset Password Routes
        Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');

    });

    Route::get('/dashboard','HomeController@index')->name('home');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
