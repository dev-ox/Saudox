<?php

Route::middleware('auth:paciente')->group(function() {

	Route::get('/home', 'HomeController@index')->name('home');

});

Route::get('/logout', 'Auth\LoginController@logout')->name('logout')->middleware('alguemLogado');
