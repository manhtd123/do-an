<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Image::class, function (Faker $faker) {
    return [
        'name' => $faker->image($dir='public/assets/images/products', $width=200, $height=200,null, false),
        'product_id' => App\Models\Product::all()->random()->id,
    ];
});
