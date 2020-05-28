<?php

// Dentro do namespace (diretorio) Auth
Route::namespace('Auth')->group(function(){

    //Login Routes
    Route::get('/login','LoginController@showLoginForm')->name('login');
    Route::post('/login','LoginController@login')->name('efetuarLogin');
    Route::post('/logout','LoginController@logout')->name('logout');
    Route::get('/logout','LoginController@logout')->name('logout');

    // TODO: Pensar bem em como vai fazer isso
    Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');


    // TODO: Pensar bem em como vai fazer isso
    //Reset Password Routes
    Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');

});

Route::get('/home','HomeController@index')->name('home');
