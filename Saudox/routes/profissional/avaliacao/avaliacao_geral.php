<?php

Route::prefix('fonoaudiologia')->name('.fonoaudiologia')->group(function () {
    require 'fonoaudiologia.php';
});

Route::prefix('judo')->name('.judo')->group(function () {
    require 'judo.php';
});

Route::prefix('neuropsicologia')->name('.neuropsicologia')->group(function () {
    require 'neuropsicologia.php';
});

Route::prefix('terapia_ocupacional')->name('.terapia_ocupacional')->group(function () {
    require 'terapia_ocupacional.php';
});
