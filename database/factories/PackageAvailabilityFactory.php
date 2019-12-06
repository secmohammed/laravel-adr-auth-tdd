<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PackageAvailabilities\Domain\Models\PackageAvailability;
use App\Packages\Domain\Models\Package;
use Faker\Generator as Faker;

$factory->define(PackageAvailability::class, function (Faker $faker) {
    return [
        'package_id' => function () {
            return factory(Package::class)->create()->id;
        },
        'start_date' => now(),
        'end_date' => now()->addDays(10),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
