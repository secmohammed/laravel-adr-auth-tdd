<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class TablePackageHotelTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        \App\PackageHotels\Domain\Models\PackageHotelTranslation::create([
            'package_hotel_id'=>1,
            'locale'=>'en',
            'name'=>'Hotel Name One',
            'description'=>'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ',
        ]);
        \App\PackageHotels\Domain\Models\PackageHotelTranslation::create([
            'package_hotel_id'=>1,
            'locale'=>'ar',
            'name'=>'اسم الفندق الاول',
            'description'=>'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم'
        ]);

        \App\PackageHotels\Domain\Models\PackageHotelTranslation::create([
            'package_hotel_id'=>2,
            'locale'=>'en',
            'name'=>'Hotel Name One',
            'description'=>'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ',
        ]);
        \App\PackageHotels\Domain\Models\PackageHotelTranslation::create([
            'package_hotel_id'=>2,
            'locale'=>'ar',
            'name'=>'اسم الفندق الاول',
            'description'=>'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم'
        ]);

        \App\PackageHotels\Domain\Models\PackageHotelTranslation::create([
            'package_hotel_id'=>3,
            'locale'=>'en',
            'name'=>'Hotel Name One',
            'description'=>'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ',
        ]);
        \App\PackageHotels\Domain\Models\PackageHotelTranslation::create([
            'package_hotel_id'=>3,
            'locale'=>'ar',
            'name'=>'اسم الفندق الاول',
            'description'=>'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم'
        ]);

        \App\PackageHotels\Domain\Models\PackageHotelTranslation::create([
            'package_hotel_id'=>4,
            'locale'=>'en',
            'name'=>'Hotel Name One',
            'description'=>'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ',
        ]);
        \App\PackageHotels\Domain\Models\PackageHotelTranslation::create([
            'package_hotel_id'=>4,
            'locale'=>'ar',
            'name'=>'اسم الفندق الاول',
            'description'=>'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم'
        ]);

    }
}
