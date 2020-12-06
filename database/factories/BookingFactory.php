<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Booking::class, function (Faker $faker) {
    return [
        'customer_id' => App\Models\Customer::all()->random()->id,
        'table_id' => App\Models\Table::all()->random()->id,
        'user_id' => App\Models\User::where('department_id', 4)->get()->random()->id,
        'time' => new DateTime(),
        'people_number' => $faker->numberBetween($min = 4, $max = 8),
        'status' => $faker->randomElement([0,1]),
    ];
});
