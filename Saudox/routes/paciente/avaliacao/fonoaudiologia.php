<?php

Route::get('teste', function () {
    return 'fonoaudiologia.php';
});

Route::get('ver', 'PacienteAvaliacaoController@verFono')->name('.ver');
