<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Users\Domain\Models\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'slug' => 'admin',
        'name' => 'Administrator',
        'permissions' => [
            'create-ad' => true,
        ],

    ];
});
