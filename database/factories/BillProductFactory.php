<?php

use Faker\Generator as Faker;

$factory->define(App\Models\BillProduct::class, function (Faker $faker) {
    return [
        'total' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 5000, $max = 10000),
        'quantity' => $faker->numberBetween($min = 50, $max = 100),
        'supplier_id' => App\Models\Supplier::all()->random()->id,
        'user_id' => App\Models\User::all()->random()->id,
        'date' => new DateTime(),
    ];
});
