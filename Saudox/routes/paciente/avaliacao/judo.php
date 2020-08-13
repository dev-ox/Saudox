<?php

Route::get('teste', function () {
    return 'judo.php';
});

Route::get('ver', 'PacienteAvaliacaoController@ver_judo')->name('.ver');
