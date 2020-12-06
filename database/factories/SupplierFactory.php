<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Supplier::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone' => $faker->numerify($string = '##########'),
        'address' => $faker->address,
        'supplier_group_id' => $faker->numberBetween($min = 1, $max = 3),
    ];
});
