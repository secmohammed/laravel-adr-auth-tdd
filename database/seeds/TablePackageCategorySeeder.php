<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TablePackageCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        \App\PackageCategories\Domain\Models\PackageCategory::create([
            'slug'=>$faker->randomLetter,
            'image'=>$faker->image('public/storage/images',400,300,null,false)
        ]);
        \App\PackageCategories\Domain\Models\PackageCategory::create([
            'slug'=>$faker->randomLetter,
            'image'=>$faker->image('public/storage/images',400,300,null,false)
        ]);
        \App\PackageCategories\Domain\Models\PackageCategory::create([
            'slug'=>$faker->randomLetter,
            'image'=>$faker->image('public/storage/images',400,300,null,false)
        ]);
        \App\PackageCategories\Domain\Models\PackageCategory::create([
            'slug'=>$faker->randomLetter,
            'image'=>$faker->image('public/storage/images',400,300,null,false)
        ]);
    }
}
