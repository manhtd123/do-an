<?php

use Faker\Generator as Faker;

$factory->define(App\Models\TableGroup::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
