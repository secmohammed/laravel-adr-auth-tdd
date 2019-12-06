<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Currencies\Domain\Models\Currency;
use Faker\Generator as Faker;

$factory->define(Currency::class, function (Faker $faker) {
    return [
        'currency_name' => 'Dollar',
        'currency_name_en' => 'Dollar',
        'isoAlpha_3' => 'USD',
        'isoNum_3' => '546',
        'equal_to_dollar' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
$factory->state(Curency::class, 'sar', function ($faker) {
    return [
        'currency_name' => 'ريال سعودى',
        'currency_name_en' => 'saudi ryial',
        'isoAlpha_3' => 'SAR',
        'isoNum_3' => '544',
        'equal_to_dollar' => 0.27,

    ];
});
