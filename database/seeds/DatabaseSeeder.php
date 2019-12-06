<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(TablePackageCategorySeeder::class);
         $this->call(TablePackageCategoryTranslationsSeeder::class);
         $this->call(TablePackageSeeder::class);
         $this->call(TablePackageTranslationSeeder::class);
         $this->call(TablePackageMainInclusionSeeder::class);
         $this->call(TablePackageMainInclusionTranslationSeeder::class);
         $this->call(TablePackagePackageMainInclusionSeeder::class);
         $this->Call(TablePackageTypeSeeder::class);
         $this->Call(TablePackageTypeTranslationSeeder::class);
         $this->Call(TablePackageHotelSeeder::class);
         $this->Call(TablePackageHotelTranslationSeeder::class);
         $this->Call(TableCountrySeeder::class);
         $this->Call(TableCitySeeder::class);
         $this->Call(TablePackageHotelAmenitySeeder::class);
         $this->Call(TablePackageHotelAmenityTranslationsSeeder::class);
         $this->Call(TableCurrencySeeder::class);
         $this->Call(TablePackageTypeGuestSeeder::class);
         $this->Call(TablePackageCountrySeeder::class);
         $this->Call(TablePackageCitySeeder::class);
         $this->Call(TablePackageAvailabilitySeeder::class);
         $this->call(TablePackageRequestPriceSeeder::class);
         $this->call(TableTitleTranslationsSeeder::class);
    }
}
