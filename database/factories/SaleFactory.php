<?php

use Faker\Generator as Faker;

$factory->define(App\Sale::class, function (Faker $faker) use ($factory) {
    return [

        'paid' => $faker->boolean,
        'wayToPay'=>$faker->randomElement(['creditCar','cash']),
        'client_id' => $factory->create(App\Client::class)->id,
        'employee_id' => $factory->create(App\Employee::class)->id,


    ];
});
