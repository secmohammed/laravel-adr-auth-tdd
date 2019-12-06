<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Packages\Domain\Models\Package;
use Faker\Generator as Faker;

$factory->define(Package::class, function (Faker $faker) {
    return [
        'package_category_id' => 3,
        'days' => $faker->randomDigit,
        'nights' => $faker->randomDigit,
        'slug' => $faker->name,
        'special_offer' => $faker->boolean,
        'rate' => $faker->randomDigit,
        'images' => [
            $faker->image("public/storage/images", 400, 300, null, true),
            $faker->image("public/storage/images", 400, 300, null, true),
            $faker->image("public/storage/images", 400, 300, null, true),
        ],
    ];
});
