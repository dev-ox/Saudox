<?php

Route::prefix('fonoaudiologia')->group(function () {
    require 'fonoaudiologia.php';
});

Route::prefix('psicopedagogia')->group(function () {
    require 'psicopedagogia.php';
});

Route::prefix('terapia_ocupacional')->group(function () {
    require 'terapia_ocupacional.php';
});
