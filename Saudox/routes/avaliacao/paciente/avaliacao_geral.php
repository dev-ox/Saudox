<?php

Route::prefix('fonoaudiologia')->group(function () {
    require 'fonoaudiologia.php';
});

Route::prefix('judo')->group(function () {
    require 'judo.php';
});

Route::prefix('neuropsicologia')->group(function () {
    require 'neuropsicologia.php';
});

Route::prefix('terapia_ocupacional')->group(function () {
    require 'terapia_ocupacional.php';
});
