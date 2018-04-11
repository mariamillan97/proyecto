<?php

use Faker\Generator as Faker;

$factory->define(App\Client::class, function (Faker $faker) use ($factory) {
    return [

        'debt' => $faker->randomDigit,
        'socSecNum'=>$faker->name,
        'purchasedProducts'=>$faker ->numberBetween($min =0,$max = 9000),
        'user_id' => $factory->create(App\User::class)->id,


    ];
});
