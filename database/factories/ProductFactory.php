<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) use ($factory){
    return [

        'name'=> $faker->name,
        'pricePurchase'=>$faker->numberBetween($min = 0.05, $max = 200.0),
        'priceSale'=>$faker->numberBetween($min = 0.10, $max = 210.0),
        'dateOfExpiry'=>$faker->dateTimeBetween($startDate = '-1years', $endDate='+2years', $timezone=null), /*que el max no sea now*/
        'stock'=>$faker->numberBetween($min=0,$max=50),
        'prescription'=>$faker->boolean,
     //   'quantity'=> $factory->numberBetween($min=0, $max=0),
        /*'provider_id' => $factory->create(App\Provider::class)->id,*/

    ];
});
