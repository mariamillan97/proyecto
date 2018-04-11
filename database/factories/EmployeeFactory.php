<?php

use Faker\Generator as Faker;

$factory->define(App\Employee::class, function (Faker $faker) use ($factory) {
    return [

        'salary'=>$faker->numberBetween($min = 1000, $max = 3000),
        'role_id' => $factory->create(App\Role::class)->id,
        'user_id' => $factory->create(App\User::class)->id,

    ];
});
