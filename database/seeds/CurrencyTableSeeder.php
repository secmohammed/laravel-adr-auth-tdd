<?php

use App\Currencies\Domain\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Currency::class)->states('sar')->create();
        factory(Currency::class)->create();
    }
}
