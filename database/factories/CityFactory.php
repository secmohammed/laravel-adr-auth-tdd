<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cities\Domain\Models\City;
use App\Countries\Domain\Models\Country;
use Faker\Generator as Faker;

$factory->define(City::class, function (Faker $faker) {
    return [
        'name' => $faker->city,
        'name_ar' => $faker->city,
        'country_id' => function () {
            return factory(Country::class)->create()->id;
        },
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
