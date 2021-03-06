<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Country;
use App\Gender;
use App\Color;
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
    $country = Country::all()->random(1)->first();
    $gender = Gender::all()->random(1)->first();
    $color = Color::all()->random(1)->first();
    return [
        'name' => $faker->name(),
        'age' => $faker->numberBetween(13,65),
        'height' => $faker->numberBetween(135,205),
        'avatar' => $faker->unique()->image('public/storage/images',400,300, 'people', false),
        'country_id' => $country->id,
        'gender_id' => $gender->id,
        'color_id' => $color->id,
        'is_active' => $faker->numberBetween(0,1),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        'remember_token' => Str::random(10),
    ];
});
