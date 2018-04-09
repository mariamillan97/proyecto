<?php

use Faker\Generator as Faker;

$factory->define(App\ProductSale::class, function (Faker $faker) use ($factory){
    return [

        'quantity'=> $faker->numberBetween($min = 1, $max = 15),
        'product_id' => $factory->create(App\Product::class)->id,
        'sale_id'=> $factory->create(App\Sale::class)->id,
/*buscar en la ya creadas*/
    ];
});
