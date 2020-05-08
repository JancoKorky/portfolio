<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\User;
use Faker\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'title' => $faker->word,
        'text' => $faker->text(1000),
        'remember_token' => Str::random(10),
        'updated_at' => now(),
        'created_at' => $faker->dateTimeInInterval(-2)
    ];
});

$factory->define(Category::class, function (Faker $faker) {
    return [
        'category_name' => $faker->unique()->word,
        'description' => $faker->word,
        'user_id'=> User::all()->random()->id
    ];
});
