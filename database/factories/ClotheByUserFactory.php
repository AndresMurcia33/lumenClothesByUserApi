<?php

/*
|--------------------------------------------------------------------------
| Model Factories Clothes by user
|--------------------------------------------------------------------------
*/

$factory->define(App\ClotheByUser::class, function (Faker\Generator $faker) {
    
    $description  = $faker->sentence(7);
    return [
        'name' => $faker -> name,
        'description' => $description,
        'price' => rand(100,1000),
        'category_id' => rand(1, 8),
        'state' => rand(0,1),
        'clothing_size_id' => rand(1,5),
        'clothing_brand_id' =>rand(1,5)
    ];
});
