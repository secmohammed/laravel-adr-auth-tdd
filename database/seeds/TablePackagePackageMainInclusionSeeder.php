<?php

use Illuminate\Database\Seeder;

class TablePackagePackageMainInclusionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\PackageCategories\Domain\Models\PackagePackageMainInclusion::create([
            'main_inclusion_id'=>1,
            'package_id'=>1,
        ]);
        \App\PackageCategories\Domain\Models\PackagePackageMainInclusion::create([
            'main_inclusion_id'=>2,
            'package_id'=>1,
            ]);
        \App\PackageCategories\Domain\Models\PackagePackageMainInclusion::create([
            'main_inclusion_id'=>1,
            'package_id'=>2,
        ]);
        \App\PackageCategories\Domain\Models\PackagePackageMainInclusion::create([
            'main_inclusion_id'=>2,
            'package_id'=>2,
        ]);

        \App\PackageCategories\Domain\Models\PackagePackageMainInclusion::create([
            'main_inclusion_id'=>1,
            'package_id'=>3,
        ]);
        \App\PackageCategories\Domain\Models\PackagePackageMainInclusion::create([
            'main_inclusion_id'=>2,
            'package_id'=>3,
        ]);

        \App\PackageCategories\Domain\Models\PackagePackageMainInclusion::create([
            'main_inclusion_id'=>1,
            'package_id'=>4,
        ]);
        \App\PackageCategories\Domain\Models\PackagePackageMainInclusion::create([
            'main_inclusion_id'=>2,
            'package_id'=>4,
        ]);
    }
}
