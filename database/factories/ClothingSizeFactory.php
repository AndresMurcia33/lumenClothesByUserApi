<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\ClothingSize::class, function (Faker\Generator $faker) {
    $name  = $faker -> unique() -> word(10);
    return [
        'name' => $name,
        'state' => rand(0,1),
    ];
});
