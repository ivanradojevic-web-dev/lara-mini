<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Email;
use Faker\Generator as Faker;

$factory->define(Email::class, function (Faker $faker) {
    return [
    	'address' => $faker->unique()->safeEmail,
        'user_id' => factory(App\User::class),
    ];
});
