<?php

use Illuminate\Database\Seeder;

class TablePackageAvailabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\PackageAvailabilities\Domain\Models\PackageAvailability::create([
            'package_id'=>1,
            'start_date'=>\Carbon\Carbon::now(),
            'end_date'=>\Carbon\Carbon::now()->addDays(10)
        ]);
        \App\PackageAvailabilities\Domain\Models\PackageAvailability::create([
            'package_id'=>1,
            'start_date'=>\Carbon\Carbon::now()->addMonth(),
            'end_date'=>\Carbon\Carbon::now()->addMonth()->addDays(15)
        ]);
        \App\PackageAvailabilities\Domain\Models\PackageAvailability::create([
            'package_id'=>1,
            'start_date'=>\Carbon\Carbon::now()->addMonths(2),
            'end_date'=>\Carbon\Carbon::now()->addMonths(2)->addDays(13)
        ]);
        \App\PackageAvailabilities\Domain\Models\PackageAvailability::create([
            'package_id'=>2,
            'start_date'=>\Carbon\Carbon::now(),
            'end_date'=>\Carbon\Carbon::now()->addDays(10)
        ]);
        \App\PackageAvailabilities\Domain\Models\PackageAvailability::create([
            'package_id'=>2,
            'start_date'=>\Carbon\Carbon::now()->addMonth(),
            'end_date'=>\Carbon\Carbon::now()->addMonth()->addDays(15)
        ]);
        \App\PackageAvailabilities\Domain\Models\PackageAvailability::create([
            'package_id'=>3,
            'start_date'=>\Carbon\Carbon::now()->addMonths(2),
            'end_date'=>\Carbon\Carbon::now()->addMonths(2)->addDays(13)
        ]);

        \App\PackageAvailabilities\Domain\Models\PackageAvailability::create([
            'package_id'=>4,
            'start_date'=>\Carbon\Carbon::now(),
            'end_date'=>\Carbon\Carbon::now()->addDays(10)
        ]);
        \App\PackageAvailabilities\Domain\Models\PackageAvailability::create([
            'package_id'=>4,
            'start_date'=>\Carbon\Carbon::now()->addMonth(),
            'end_date'=>\Carbon\Carbon::now()->addMonth()->addDays(15)
        ]);
        \App\PackageAvailabilities\Domain\Models\PackageAvailability::create([
            'package_id'=>4,
            'start_date'=>\Carbon\Carbon::now()->addMonths(2),
            'end_date'=>\Carbon\Carbon::now()->addMonths(2)->addDays(13)
        ]);
    }
}
