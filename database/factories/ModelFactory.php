<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence(4),
    ];
});

$factory->define(App\Models\UserType::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence(4),
    ];
});

$factory->define(App\Models\Product::class, function (Faker\Generator $faker) {
    return [
        'category_id' => mt_rand(1, 50),
        'code' => $faker->randomNumber(13, true),
        'brand' => $faker->name,
        'name' => $faker->name,
        'dear_date' => $faker->randomNumber(8, true)
    ];
});

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'user_type_id' => mt_rand(1, 3),
        'name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => '123456'
    ];
});

$factory->define(App\Models\Pantry::class, function (Faker\Generator $faker) {
    return [
        'user_id' => mt_rand(1, 20),
        'product_id' => mt_rand(1, 500),
        'expiration_date' => $faker->date('Y-m-d'),
        'quality' => $faker->randomNumber(2, true)
    ];
});