<?php

use Faker\Generator as Faker;

$factory->define(App\ProductSale::class, function (Faker $faker) use ($factory){
    return [
        'quantity'=> $faker->numberBetween($min=0, $max=0),
        'sale_id'=> $factory->create(App\Sale::class)->id,
        'product_id'=>$factory->create(App\Product::class)->id
    ];
});

