<?php
Route::get('/', function () {
    return 'home das anamnese de psicopedagogia';
});

Route::get('ver', 'PacienteAnamneseController@ver_pnp');

Route::get('teste', function () {
    return 'psicopedagogia.php';
});
