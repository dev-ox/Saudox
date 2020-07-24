<?php

Route::get('/', function () {
    return 'home das evolucao de fono';
})->name('.home');

Route::get('teste', function () {
    return 'fonoaudiologia.php';
});
