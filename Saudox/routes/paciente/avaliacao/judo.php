<?php

Route::get('teste', function () {
    return 'judo.php';
});

Route::get('ver', 'PacienteAvaliacaoController@verJudo')->name('.ver');
