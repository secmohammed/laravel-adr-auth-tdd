<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class TablePackageHotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        \App\PackageHotels\Domain\Models\PackageHotel::create([
            'package_type_id'=>1,
            'country_id'=>1,
            'city_id'=>1,
            'images'=>[ '0'=>$faker->image('public/storage/images',400,300,null,false),
                '1'=>$faker->image('public/storage/images',400,300,null,false),
                '2'=>$faker->image('public/storage/images',400,300,null,false),
            ],
            'rate'=>$faker->randomDigit,
            'longitude'=>$faker->longitude,
            'latitude'=>$faker->latitude,
        ]);
        \App\PackageHotels\Domain\Models\PackageHotel::create([
            'package_type_id'=>4,
            'country_id'=>1,
            'city_id'=>1,
            'images'=>[ '0'=>$faker->image('public/storage/images',400,300,null,false),
                '1'=>$faker->image('public/storage/images',400,300,null,false),
                '2'=>$faker->image('public/storage/images',400,300,null,false),
            ],
            'rate'=>$faker->randomDigit,
            'longitude'=>$faker->longitude,
            'latitude'=>$faker->latitude,
        ]);

        \App\PackageHotels\Domain\Models\PackageHotel::create([
            'package_type_id'=>7,
            'country_id'=>1,
            'city_id'=>1,
            'images'=>[ '0'=>$faker->image('public/storage/images',400,300,null,false),
                '1'=>$faker->image('public/storage/images',400,300,null,false),
                '2'=>$faker->image('public/storage/images',400,300,null,false),
            ],
            'rate'=>$faker->randomDigit,
            'longitude'=>$faker->longitude,
            'latitude'=>$faker->latitude,
        ]);

        \App\PackageHotels\Domain\Models\PackageHotel::create([
            'package_type_id'=>10,
            'country_id'=>1,
            'city_id'=>1,
            'images'=>[ '0'=>$faker->image('public/storage/images',400,300,null,false),
                '1'=>$faker->image('public/storage/images',400,300,null,false),
                '2'=>$faker->image('public/storage/images',400,300,null,false),
            ],
            'rate'=>$faker->randomDigit,
            'longitude'=>$faker->longitude,
            'latitude'=>$faker->latitude,
        ]);
    }
}
