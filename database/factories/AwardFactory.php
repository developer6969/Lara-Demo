<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Award;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Award::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'detail' => Str::random(10),
        'doctor_id' => 1,
    ];
});
