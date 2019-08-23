<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Doctor;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Doctor::class, function (Faker $faker) {
    return [
        'user_id' => 5,
        'about' => $faker->sentence,
        'profile_id' => 1,
        'address_id' => 1,
    ];
});
