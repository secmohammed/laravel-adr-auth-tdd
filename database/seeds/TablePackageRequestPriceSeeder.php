<?php

use Illuminate\Database\Seeder;

class TablePackageRequestPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\PackageRequestPrices\Domain\Models\PackageRequestPrice::create([
            'min_price'=>'100',
            'max_price'=>'300',
            'currency_id'=>1
        ]);
        \App\PackageRequestPrices\Domain\Models\PackageRequestPrice::create([
            'min_price'=>'300',
            'max_price'=>'600',
            'currency_id'=>1
        ]);
        \App\PackageRequestPrices\Domain\Models\PackageRequestPrice::create([
            'min_price'=>'600',
            'max_price'=>'900',
            'currency_id'=>1
        ]);

    }
}
