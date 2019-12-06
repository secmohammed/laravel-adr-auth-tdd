<?php

use Illuminate\Database\Seeder;

class TableCountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Countries\Domain\Models\Country::create([
            'name'=>'Egypt',
            'name_ar'=>'مصر',
            'iso3'=>'EGY',
            'iso2'=>'EG',
            'phonecode'=>'+2',
            'capital'=>'Cairo',
            'currency'=>'Pound',
            'flag'=>1,
        ]);
        \App\Countries\Domain\Models\Country::create([
            'name'=>'USA',
            'name_ar'=>'امريكا',
            'iso3'=>'USD',
            'iso2'=>'US',
            'phonecode'=>'+1',
            'capital'=>'WASHinton',
            'currency'=>'Dollar',
            'flag'=>1,
        ]);
    }
}
