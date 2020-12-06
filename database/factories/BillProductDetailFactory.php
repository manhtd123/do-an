<?php

use Faker\Generator as Faker;

$factory->define(App\Models\BillProductDetail::class, function (Faker $faker) {
    return [
        'total' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 1000, $max = 2000),
        'quantity' => $faker->numberBetween($min = 2, $max = 5),
        'bill_product_id' => App\Models\BillProduct::all()->random()->id,
        'product_id' => App\Models\Product::all()->random()->id,
    ];
});
