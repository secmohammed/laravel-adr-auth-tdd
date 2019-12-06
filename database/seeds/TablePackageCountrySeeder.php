<?php

use Illuminate\Database\Seeder;

class TablePackageCountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\PackageCountries\Domain\Models\PackageCountry::create([
            'package_id'=>'1',
            'country_id'=>'1'
        ]);
        \App\PackageCountries\Domain\Models\PackageCountry::create([
            'package_id'=>'1',
            'country_id'=>'2'
        ]);

        \App\PackageCountries\Domain\Models\PackageCountry::create([
            'package_id'=>'2',
            'country_id'=>'1'
        ]);
        \App\PackageCountries\Domain\Models\PackageCountry::create([
            'package_id'=>'2',
            'country_id'=>'2'
        ]);

        \App\PackageCountries\Domain\Models\PackageCountry::create([
            'package_id'=>'3',
            'country_id'=>'1'
        ]);
        \App\PackageCountries\Domain\Models\PackageCountry::create([
            'package_id'=>'3',
            'country_id'=>'2'
        ]);
        \App\PackageCountries\Domain\Models\PackageCountry::create([
            'package_id'=>'4',
            'country_id'=>'1'
        ]);
        \App\PackageCountries\Domain\Models\PackageCountry::create([
            'package_id'=>'4',
            'country_id'=>'2'
        ]);
    }
}
