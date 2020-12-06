<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'describe' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'purchase_price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 2000, $max = 3000),
        'sale_price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 3500, $max = 5000),
        'bua' => $faker->randomElement(['sáng', 'trưa', 'tối']),
        'img' => $faker->image($dir='public/assets/images/products', $width=60, $height=60,null, false),
        'unit' => $faker->randomElement(['thùng', 'đĩa', 'hộp']),
        'quantity' => $faker->numberBetween($min = 50, $max = 100),
        'category_id' => App\Models\Category::all()->random()->id,
        'bill_product_id' => App\Models\BillProduct::all()->random()->id,
    ];
});
