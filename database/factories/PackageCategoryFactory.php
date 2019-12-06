<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PackageCategories\Domain\Models\PackageCategory;
use Faker\Generator as Faker;

$factory->define(PackageCategory::class, function (Faker $faker) {
    return [
        'image'=>$faker->image('public/storage/images',400,300,null,true)
    ];
});
