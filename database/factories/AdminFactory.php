<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Admin::class, function (Faker $faker) {
    return [
        'email' => 'admin@gmail.com',
        'password' => bcrypt('123456'),
        'name' => 'Admin',
    ];
});
