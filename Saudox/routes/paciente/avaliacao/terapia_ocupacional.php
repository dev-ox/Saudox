<?php

Route::get('teste', function () {
    return 'terapia_ocupacional.php';
});

Route::get('ver', 'PacienteAvaliacaoController@ver_terapia_ocupacional')->name('.ver');
