<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) use ($factory){
    return [

        'name'=> $faker->name,
        'pricePurchase'=>$faker->numberBetween($min = 0.05, $max = 200),
        'priceSale'=>$faker->numberBetween($min = 0.10, $max = 210),
        'dateOfExpiry'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'stock'=>$faker->numberBetween($min = 0, $max = 100),
        'prescription'=>$faker->boolean,

    ];
});
