<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->numerify($string = '##########'),
        'birthday' => $faker->dateTimeBetween('1990-2-2', 'now'),
        'avatar' => $faker->image($dir='public/assets/images/customer', $width=60, $height=60,null, false),
        'sex' =>$faker->boolean,
        'rank' =>$faker->boolean,
    ];
});
