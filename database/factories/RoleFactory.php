<?php

use Faker\Generator as Faker;

$factory->define(App\Role::class, function (Faker $faker) use ($factory){
    return [

        'name'=> $faker->randomElement($array = array ('boss','pharmacist','adm'))

    ];
});
