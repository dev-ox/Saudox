<?php
Route::get('/', function () {
    return 'home das anamnese de psicopedagogia';
})->name('.home');

Route::get('ver', 'PacienteAnamneseController@ver_pnp')->name('.ver');

Route::get('teste', function () {
    return 'psicopedagogia.php';
});
