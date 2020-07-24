<?php
Route::get('/', function () {
    return 'home das evolucao de judo';
})->name('.home');
Route::get('teste', function () {
    return 'judo.php';
});
