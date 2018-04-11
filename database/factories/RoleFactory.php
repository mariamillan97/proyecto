<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name'=> $faker->randomElement($array = array ('boss','pharmacist','adm'))

    ];
});
