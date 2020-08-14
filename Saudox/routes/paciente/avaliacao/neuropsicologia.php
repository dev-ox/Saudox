<?php

Route::get('teste', function () {
    return 'neuropsicologia.php';
});

Route::get('ver', 'PacienteAvaliacaoController@verNeuro')->name('.ver');
