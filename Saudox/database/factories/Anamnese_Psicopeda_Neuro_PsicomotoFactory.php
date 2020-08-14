<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Paciente;
use App\AnamneseGigantePsicopedaNeuroPsicomoto;
use App\Profissional;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(AnamneseGigantePsicopedaNeuroPsicomoto::class, function (Faker $faker),  {
    factory(AnamneseGigantePsicopedaNeuroPsicomotoPt1::class)->create([
        'id_tp' => 1,
        'id_paciente' => 1,
        'id_profissional' => 1,
    ]);
    factory(AnamneseGigantePsicopedaNeuroPsicomotoPt2::class)->create();
    factory(AnamneseGigantePsicopedaNeuroPsicomotoPt3::class)->create();
    return [
        'id_tp' -> 1,
        ];
    });
