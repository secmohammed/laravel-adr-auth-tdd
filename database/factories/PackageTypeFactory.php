<?php

use App\Currencies\Domain\Models\Currency;
use App\Packages\Domain\Models\Package;
use App\PackageTypes\Domain\Models\PackageType;
use Faker\Generator as Faker;
/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(PackageType::class, function (Faker $faker) {
    return [
        'package_id' => function () {
            return factory(Package::class)->create()->id;
        },
        'adult_price' => $faker->numberBetween(10, 30),
        'child_6_12_price' => $faker->numberBetween(10, 30),
        'child_2_6_price' => $faker->numberBetween(10, 30),
        'infant_price' => $faker->numberBetween(10, 30),
        'currency_id' => function () {
            return factory(Currency::class)->create()->id;
        },
    ];
});
