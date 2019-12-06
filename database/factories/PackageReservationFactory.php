<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PackageReservations\Domain\Models\PackageReservation;
use App\PackageReservations\Domain\Models\PackageType;
use App\Packages\Domain\Models\Package;
use Faker\Generator as Faker;


$factory->define(PackageReservation::class , function (Faker $faker) {

		return [
			'package_id' => function () 
            {
				return factory(Package::class)->create()->id;
			},
			'approved_at'     => now(),
			'package_type_id' => function () {
				return factory(PackageType::class )->create()->id;
			},
			'package_name'  => $faker->name,
			'check_in_date' => now(),
			'rooms'         => [

			],
			'price'    => $faker->number,
			'currency' => 'US',

		];
	});
