<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Email;
use Faker\Generator as Faker;

$factory->define(Email::class, function (Faker $faker) {
    return [
    	'address' => $faker->unique()->safeEmail,
        'user_id' => $faker->numberBetween($min = 1, $max = 10),
    ];
});
