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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'username' => $faker->unique()->numerify('Hello, I am ###'),
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('123456'),
        'question' => $faker->realText($maxNbChars = 45, $indexSize = 2),
        'answer' => $faker->realText($maxNbChars = 45, $indexSize = 2),
        'lang' => $faker->languageCode,
        'remember_token' => str_random(10)
    ];
});

$factory->define(App\Image::class, function (Faker\Generator $faker) {
    return [
        'src' => $faker->imageUrl($width = 500, $height = 500)
    ];
});

$factory->define(App\Spacebox::class, function (Faker\Generator $faker) {
    return [
        'description' => $faker->realText($maxNbChars = 100, $indexSize = 2),
        'lang' => $faker->languageCode,
        'visible' => rand(0,1)
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'date' => $faker->date($format = 'd/m/Y', $max = 'now'),
        'title' => $faker->realText($maxNbChars = 50, $indexSize = 2),
        'content' => $faker->realText($maxNbChars = 1000, $indexSize = 2)
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'date' => $faker->date($format = 'd/m/Y', $max = 'now'),
        'comment' => $faker->realText($maxNbChars = 200, $indexSize = 2)
    ];
});
