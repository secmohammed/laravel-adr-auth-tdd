<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Countries\Domain\Models\Country;
use Faker\Generator as Faker;

$factory->define(Country::class, function (Faker $faker) {
    return [
        'name' => 'United States',
        'name_ar' => 'الولايات المتحده الامريكيه ',
        'iso3' => 'USA',
        'iso2' => 'US',
        'phonecode' => '+1',
        'capital' => 'Washington',
        'currency' => '$',
        'flag' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
