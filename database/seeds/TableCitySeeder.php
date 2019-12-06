<?php

use Illuminate\Database\Seeder;

class TableCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Cities\Domain\Models\City::create([
           'country_id'=>'1',
           'name'=>'cairo',
           'name_ar'=>'القاهره',
        ]);
        \App\Cities\Domain\Models\City::create([
            'country_id'=>'1',
            'name'=>'Alexandria',
            'name_ar'=>'الاسكندريه',
        ]);
        \App\Cities\Domain\Models\City::create([
            'country_id'=>'2',
            'name'=>'NY',
            'name_ar'=>'نيويورك',
        ]);
        \App\Cities\Domain\Models\City::create([
            'country_id'=>'1',
            'name'=>'NewGercy',
            'name_ar'=>'جيرسى',
        ]);
    }
}
