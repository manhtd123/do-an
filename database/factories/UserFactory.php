<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make(123456),
        'remember_token' => str_random(10),
        'birthday' => $faker->dateTimeBetween('1990-2-2', 'now'),
        'avatar' => $faker->image($dir='public/assets/avatar', $width=60, $height=60,null, false),
        'address' => $faker->address,
        'department_id' => $faker->numberBetween($min = 2, $max = 4),
        'sex' =>$faker->boolean,
    ];
});
