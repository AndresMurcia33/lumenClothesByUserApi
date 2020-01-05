<?php

/*
|--------------------------------------------------------------------------
| Model Factories Clothing Brand
|--------------------------------------------------------------------------
*/

$factory->define(App\ClothingBrand::class, function (Faker\Generator $faker) {
    $name  = $faker -> unique() -> word(10);
    return [
        'name' => $name,
        'state' => rand(0,1),
    ];
});
