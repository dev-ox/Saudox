<?php

Route::prefix('fonoaudiologia')->group(function () {
    require 'fonoaudiologia.php';
});

Route::prefix('judo')->group(function () {
    require 'judo.php';
});

Route::prefix('psicologica')->group(function () {
    require 'psicologica.php';
});

Route::prefix('terapia_ocupacional')->group(function () {
    require 'terapia_ocupacional.php';
});
