<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Table::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'status' => $faker->numberBetween($min = 0, $max = 2),
        'table_group_id' => App\Models\TableGroup::all()->random()->id,
        'number_slot' => $faker->numberBetween($min = 4, $max = 8),
    ];
});
