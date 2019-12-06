<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TablePackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        \App\Packages\Domain\Models\Package::create([
            'package_category_id'=>1,
            'slug'=>$faker->name,
            'days'=>$faker->randomDigit,
            'nights'=>$faker->randomDigit,
            'special_offer'=>1,
            'rate'=>$faker->randomDigit,
            'images'=>[ '0'=>$faker->image('public/storage/images',400,300,null,false),
                '1'=>$faker->image('public/storage/images',400,300,null,false),
                '2'=>$faker->image('public/storage/images',400,300,null,false),
            ],
            'instant_booking'=>0

        ]);

        \App\Packages\Domain\Models\Package::create([
            'package_category_id'=>2,
            'slug'=>$faker->name,
            'days'=>$faker->randomDigit,
            'nights'=>$faker->randomDigit,
            'special_offer'=>1,
            'rate'=>$faker->randomDigit,
            'images'=>[ '0'=>$faker->image('public/storage/images',400,300,null,false),
                '1'=>$faker->image('public/storage/images',400,300,null,false),
                '2'=>$faker->image('public/storage/images',400,300,null,false),
            ],
        ]);
        \App\Packages\Domain\Models\Package::create([
            'package_category_id'=>2,
            'slug'=>$faker->name,
            'days'=>$faker->randomDigit,
            'nights'=>$faker->randomDigit,
            'special_offer'=>1,
            'rate'=>$faker->randomDigit,
            'images'=>[ '0'=>$faker->image('public/storage/images',400,300,null,false),
                '1'=>$faker->image('public/storage/images',400,300,null,false),
                '2'=>$faker->image('public/storage/images',400,300,null,false),
            ],
        ]);
        \App\Packages\Domain\Models\Package::create([
            'package_category_id'=>2,
            'slug'=>$faker->name,
            'days'=>$faker->randomDigit,
            'nights'=>$faker->randomDigit,
            'special_offer'=>1,
            'rate'=>$faker->randomDigit,
            'images'=>[ '0'=>$faker->image('public/storage/images',400,300,null,false),
                '1'=>$faker->image('public/storage/images',400,300,null,false),
                '2'=>$faker->image('public/storage/images',400,300,null,false),
            ],
        ]);
    }
}
