<?php

use Illuminate\Database\Seeder;

class TablePackageCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\PackageCities\Domain\Models\PackageCity::create([
           'package_id'=>'1',
           'city_id'=>'1'
        ]);
        \App\PackageCities\Domain\Models\PackageCity::create([
            'package_id'=>'1',
            'city_id'=>'2'
        ]);
        \App\PackageCities\Domain\Models\PackageCity::create([
            'package_id'=>'2',
            'city_id'=>'1'
        ]);
        \App\PackageCities\Domain\Models\PackageCity::create([
            'package_id'=>'2',
            'city_id'=>'2'
        ]);
        \App\PackageCities\Domain\Models\PackageCity::create([
            'package_id'=>'3',
            'city_id'=>'1'
        ]);
        \App\PackageCities\Domain\Models\PackageCity::create([
            'package_id'=>'3',
            'city_id'=>'2'
        ]);
        \App\PackageCities\Domain\Models\PackageCity::create([
            'package_id'=>'4',
            'city_id'=>'1'
        ]);
        \App\PackageCities\Domain\Models\PackageCity::create([
            'package_id'=>'4',
            'city_id'=>'2'
        ]);
    }
}
