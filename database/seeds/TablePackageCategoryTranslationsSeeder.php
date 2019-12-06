<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TablePackageCategoryTranslationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        \App\PackageCategories\Domain\Models\PackageCategoryTranslation::create([
            'package_category_id'=>'1',
            'locale'=>'en',
            'name'=>'title In En',
        ]);
        \App\PackageCategories\Domain\Models\PackageCategoryTranslation::create([
            'package_category_id'=>'1',
            'locale'=>'ar',
            'name'=>'العنوان بالعربى',
        ]);

        \App\PackageCategories\Domain\Models\PackageCategoryTranslation::create([
            'package_category_id'=>'2',
            'locale'=>'en',
            'name'=>'title In En2',
        ]);
        \App\PackageCategories\Domain\Models\PackageCategoryTranslation::create([
            'package_category_id'=>'2',
            'locale'=>'ar',
            'name'=>'2العنوان بالعربى',
        ]);
    }
}
