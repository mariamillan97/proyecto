<?php

use Faker\Generator as Faker;

$factory->define(App\Provider::class, function (Faker $faker) use ($factory){
    return [

        'name'=>$faker->name,
        'address'=>$faker->address,
        'email'=>$faker->unique()->safeEmail,
        'number'=>$faker->unique()->phoneNumber,

    ];
});
