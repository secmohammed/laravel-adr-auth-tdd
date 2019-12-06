<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BookedPackages\Domain\Models\BookedPackage;
use App\Packages\Domain\Models\Package;
use App\PackageTypes\Domain\Models\PackageType;
use App\Users\Domain\Models\User;
use Faker\Generator as Faker;

$factory->define(BookedPackage::class, function (Faker $faker) {
    return [
        'package_id' => function () {
            return factory(Package::class)->create()->id;
        },
        'package_type_id' => function () {
            return factory(PackageType::class)->create()->id;
        },
        'package_name' => $faker->name,
        'check_in_date' => now(),
        'rooms' => "[{'name': 'name'}]",
        'currency' => $faker->currencyCode,
        'state' => $faker->state,
        'country' => $faker->country,
        'address' => $faker->address,
        'postal_code' => $faker->postcode,
        'price' => $faker->numberBetween(30, 100),
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },

    ];
});
