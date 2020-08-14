<?php

Route::get('/', function () {
    return 'home das anamnese de fono';
})->name('.home');

Route::get('ver', 'PacienteAnamneseController@verFono')->name('.ver');

Route::get('teste', function () {
    return 'fonoaudiologia.php';
});
