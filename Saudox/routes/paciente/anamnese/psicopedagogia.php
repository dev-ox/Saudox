<?php
Route::get('/', function () {
    return 'home das anamnese de psicopedagogia';
})->name('.home');

Route::get('ver', 'PacienteAnamneseController@verPnp')->name('.ver');

Route::get('teste', function () {
    return 'psicopedagogia.php';
});
