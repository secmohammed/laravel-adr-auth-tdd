<?php

use Illuminate\Database\Seeder;

class TablePackageTypeGuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\PackageTypeGuests\Domain\Models\PackageTypeGuest::create([
            'package_type_id'=>1,
            'adults_no'=>4,
            'child_6_12_no'=>3,
            'child_2_6_no'=>2,
            'infant_no'=>1,

        ]);
        \App\PackageTypeGuests\Domain\Models\PackageTypeGuest::create([
            'package_type_id'=>1,
            'adults_no'=>2,
            'child_6_12_no'=>3,
            'child_2_6_no'=>1,
            'infant_no'=>1,

        ]);

        \App\PackageTypeGuests\Domain\Models\PackageTypeGuest::create([
            'package_type_id'=>4,
            'adults_no'=>4,
            'child_6_12_no'=>3,
            'child_2_6_no'=>2,
            'infant_no'=>1,

        ]);
        \App\PackageTypeGuests\Domain\Models\PackageTypeGuest::create([
            'package_type_id'=>4,
            'adults_no'=>2,
            'child_6_12_no'=>3,
            'child_2_6_no'=>1,
            'infant_no'=>1,

        ]);

     \App\PackageTypeGuests\Domain\Models\PackageTypeGuest::create([
            'package_type_id'=>7,
            'adults_no'=>4,
            'child_6_12_no'=>3,
            'child_2_6_no'=>2,
            'infant_no'=>1,

        ]);
        \App\PackageTypeGuests\Domain\Models\PackageTypeGuest::create([
            'package_type_id'=>7,
            'adults_no'=>2,
            'child_6_12_no'=>3,
            'child_2_6_no'=>1,
            'infant_no'=>1,

        ]);


        \App\PackageTypeGuests\Domain\Models\PackageTypeGuest::create([
            'package_type_id'=>10,
            'adults_no'=>4,
            'child_6_12_no'=>3,
            'child_2_6_no'=>2,
            'infant_no'=>1,

        ]);
        \App\PackageTypeGuests\Domain\Models\PackageTypeGuest::create([
            'package_type_id'=>10,
            'adults_no'=>2,
            'child_6_12_no'=>3,
            'child_2_6_no'=>1,
            'infant_no'=>1,

        ]);

    }
}
