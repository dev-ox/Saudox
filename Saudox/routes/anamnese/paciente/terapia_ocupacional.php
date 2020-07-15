<?php
Route::get('/', function () {
    return 'home das anamnese de terapia_ocupacional';
});

Route::get('ver', 'PacienteAnamneseController@ver_tocp');

Route::get('teste', function () {
    return 'terapia_ocupacional.php';
});
