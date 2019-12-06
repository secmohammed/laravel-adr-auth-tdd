<?php

use App\Users\Domain\Models\PasswordReset;
use App\Users\Domain\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(PasswordReset::class, function (Faker $faker) {
    return [
        'token' => Str::random(32),
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
    ];
});

$factory->state(PasswordReset::class, 'completed', function ($faker) {
    return [
        'completed_at' => now(),
    ];
});
