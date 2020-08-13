<?php

Route::get('/','PacienteAnamneseController@home')->name('.home');

Route::prefix('fonoaudiologia')->name('.fonoaudiologia')->group(function () {
    require 'fonoaudiologia.php';
});

Route::prefix('pnp')->name('.pnp')->group(function () {
    require 'psicopedagogia.php';
});

Route::prefix('terapia_ocupacional')->name('.terapia_ocupacional')->group(function () {
    require 'terapia_ocupacional.php';
});
