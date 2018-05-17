<?php

use Faker\Generator as Faker;

$factory->define(App\Client::class, function (Faker $faker) use ($factory) {
    return [

        'debt' => $faker->numberBetween($min =0.0,$max = 100.0),
        'socSecNum'=>$faker->unique()-> randomNumber($nbDigits = NULL, $strict = false),
        'purchasedProducts'=>$faker ->numberBetween($min =0.0,$max = 100.0),
        'user_id' => $factory->create(App\User::class)->id,


    ];
});
