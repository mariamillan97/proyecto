<?php

use Faker\Generator as Faker;

$factory->define(App\Client::class, function (Faker $faker) use ($factory) {
    return [

        'deuda' => $faker->boolean,
        'socSecNum'=>$faker->name,
        'purchasedProducts'=>$faker ->numberBetween(),
        'user_id' => $factory->create(App\User::class)->id,


    ];
});
