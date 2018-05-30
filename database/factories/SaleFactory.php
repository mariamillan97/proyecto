<?php

use Faker\Generator as Faker;

$factory->define(App\Sale::class, function (Faker $faker) use ($factory) {
    return [

        'paid' => $faker->boolean,
        'client_id' => $factory->create(App\Client::class)->id,
        'employee_id' => $factory->create(App\Employee::class)->id,
        //'quantity'=> $factory->create($min=0, $max=0),

    ];
});
