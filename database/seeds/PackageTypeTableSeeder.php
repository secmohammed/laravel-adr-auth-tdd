<?php

use App\Packages\Domain\Models\Package;
use App\PackageTypes\Domain\Models\PackageType;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class PackageTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $package = factory(Package::class)->create();
        factory(PackageType::class, 3)->create([
            'package_id' => $package->id,
        ]);
    }
}
