<?php

Route::get('teste', function () {
    return 'neuropsicologia.php';
});

Route::get('ver', 'PacienteAvaliacaoController@ver_neuro')->name('.ver');
