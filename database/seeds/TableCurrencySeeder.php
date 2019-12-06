<?php

use Illuminate\Database\Seeder;

class TableCurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Currencies\Domain\Models\Currency::create([
            'currency_name'=>'Dollar',
            'currency_name_en'=>'Dollar',
            'isoAlpha_3'=>'USD',
            'isoNum_3'=>'546',
            'equal_to_dollar'=>1,
        ]);
        \App\Currencies\Domain\Models\Currency::create([
            'currency_name'=>'ريال سعودى',
            'currency_name_en'=>'saudi ryial',
            'isoAlpha_3'=>'SAR',
            'isoNum_3'=>'544',
            'equal_to_dollar'=>0.27,
        ]);
    }
}
