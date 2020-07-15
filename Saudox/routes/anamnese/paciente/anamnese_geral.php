<?php


Route::get('/','PacienteAnamneseController@home');

Route::prefix('fonoaudiologia')->group(function () {
    require 'fonoaudiologia.php';
});

Route::prefix('pnp')->group(function () {
    require 'psicopedagogia.php';
});

Route::prefix('terapia_ocupacional')->group(function () {
    require 'terapia_ocupacional.php';
});
