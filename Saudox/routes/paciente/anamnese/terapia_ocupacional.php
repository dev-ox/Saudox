<?php
Route::get('/', function () {
    return 'home das anamnese de terapia_ocupacional';
})->name('.home');

Route::get('ver', 'PacienteAnamneseController@verTocp')->name('.ver');

Route::get('teste', function () {
    return 'terapia_ocupacional.php';
});
