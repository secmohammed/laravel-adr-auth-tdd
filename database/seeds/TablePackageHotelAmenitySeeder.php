<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class TablePackageHotelAmenitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        \App\PackageHotelAmenities\Domain\Models\PackageHotelAmenity::create([
           'package_hotel_id'=>'1',
            'image'=>$faker->image('public/storage/images',400,300,null,false),
        ]);
        \App\PackageHotelAmenities\Domain\Models\PackageHotelAmenity::create([
            'package_hotel_id'=>'1',
            'image'=>$faker->image('public/storage/images',400,300,null,false),
        ]);
        \App\PackageHotelAmenities\Domain\Models\PackageHotelAmenity::create([
            'package_hotel_id'=>'1',
            'image'=>$faker->image('public/storage/images',400,300,null,false),
        ]);


        \App\PackageHotelAmenities\Domain\Models\PackageHotelAmenity::create([
            'package_hotel_id'=>'2',
            'image'=>$faker->image('public/storage/images',400,300,null,false),
        ]);
        \App\PackageHotelAmenities\Domain\Models\PackageHotelAmenity::create([
            'package_hotel_id'=>'2',
            'image'=>$faker->image('public/storage/images',400,300,null,false),
        ]);
        \App\PackageHotelAmenities\Domain\Models\PackageHotelAmenity::create([
            'package_hotel_id'=>'3',
            'image'=>$faker->image('public/storage/images',400,300,null,false),
        ]);


        \App\PackageHotelAmenities\Domain\Models\PackageHotelAmenity::create([
            'package_hotel_id'=>'3',
            'image'=>$faker->image('public/storage/images',400,300,null,false),
        ]);
        \App\PackageHotelAmenities\Domain\Models\PackageHotelAmenity::create([
            'package_hotel_id'=>'3',
            'image'=>$faker->image('public/storage/images',400,300,null,false),
        ]);
        \App\PackageHotelAmenities\Domain\Models\PackageHotelAmenity::create([
            'package_hotel_id'=>'3',
            'image'=>$faker->image('public/storage/images',400,300,null,false),
        ]);


        \App\PackageHotelAmenities\Domain\Models\PackageHotelAmenity::create([
            'package_hotel_id'=>'4',
            'image'=>$faker->image('public/storage/images',400,300,null,false),
        ]);
        \App\PackageHotelAmenities\Domain\Models\PackageHotelAmenity::create([
            'package_hotel_id'=>'4',
            'image'=>$faker->image('public/storage/images',400,300,null,false),
        ]);
        \App\PackageHotelAmenities\Domain\Models\PackageHotelAmenity::create([
            'package_hotel_id'=>'4',
            'image'=>$faker->image('public/storage/images',400,300,null,false),
        ]);
    }
}
