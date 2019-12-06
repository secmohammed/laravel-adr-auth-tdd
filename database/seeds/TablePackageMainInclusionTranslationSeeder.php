<?php

use Illuminate\Database\Seeder;

class TablePackageMainInclusionTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\PackageMainInclusions\Domain\Models\PackageMainInclusionTranslation::create([
            'main_inclusion_id'=>'1',
            'locale'=>'en',
            'name'=>'FLight'
        ]);
        \App\PackageMainInclusions\Domain\Models\PackageMainInclusionTranslation::create([
            'main_inclusion_id'=>'1',
            'locale'=>'ar',
            'name'=>'طيران'
        ]);
        \App\PackageMainInclusions\Domain\Models\PackageMainInclusionTranslation::create([
            'main_inclusion_id'=>'2',
            'locale'=>'en',
            'name'=>'Hotels'
        ]);
        \App\PackageMainInclusions\Domain\Models\PackageMainInclusionTranslation::create([
            'main_inclusion_id'=>'2',
            'locale'=>'ar',
            'name'=>'طيران'
        ]);


    }
}
