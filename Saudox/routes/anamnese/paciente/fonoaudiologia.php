<?php

Route::get('/', function () {
    return 'home das anamnese de fono';
});

Route::get('ver', 'PacienteAnamneseController@ver_fono');

Route::get('teste', function () {
    return 'fonoaudiologia.php';
});
