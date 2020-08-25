<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Worker;
use Faker\Generator as Faker;

$factory->define(Worker::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'position' => $faker->jobTitle,
        'hire_at' => $faker->dateTimeBetween('this week', '+6 days'),
        'phone' => $faker->phoneNumber(),
        'email' => $faker->safeEmail(),
        'salary' => $faker->numberBetween($min = 1000, $max = 9000),

    ];
});
