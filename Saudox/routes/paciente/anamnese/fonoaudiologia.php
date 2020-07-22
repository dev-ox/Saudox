<?php

Route::get('/', function () {
    return 'home das anamnese de fono';
})->name('.home');

Route::get('ver', 'PacienteAnamneseController@ver_fono')->name('.ver');

Route::get('teste', function () {
    return 'fonoaudiologia.php';
});
