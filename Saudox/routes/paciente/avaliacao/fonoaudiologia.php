<?php

Route::get('teste', function () {
    return 'fonoaudiologia.php';
});

Route::get('ver', 'PacienteAvaliacaoController@ver_fono')->name('.ver');
