<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'description' => $faker->sentence,
        'price' => rand(10, 100),
    ];
});

