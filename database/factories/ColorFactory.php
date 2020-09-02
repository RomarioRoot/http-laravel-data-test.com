<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Color;
use Faker\Generator as Faker;

$factory->define(Color::class, function (Faker $faker) {
    $color_data = $faker->unique()->randomElement([
        ['blue', 'primary'],
        ['grey', 'secondary'],
        ['yellow', 'warning'],
        ['dark', 'dark'],
    ]);
    return [
        'name' => $color_data[0],
        'css_class' => $color_data[1]
    ];
});
