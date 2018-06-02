<?php

use Faker\Generator as Faker;


$factory->define(App\ProductProvider::class, function (Faker $faker) use ($factory){
    return [

        'product_id'=>$factory->create(App\Product::class)->id,
        'provider_id'=> $factory->create(App\Provider::class)->id
    ];
});