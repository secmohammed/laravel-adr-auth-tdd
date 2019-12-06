<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class TablePackageMainInclusionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        \App\PackageMainInclusions\Domain\Models\PackageMainInclusion::create([
            'icon'=>$faker->image('public/storage/icons',20,20,null,false),
        ]);
        \App\PackageMainInclusions\Domain\Models\PackageMainInclusion::create([
            'icon'=>$faker->image('public/storage/icons',20,20,null,false),
        ]);
    }
}
