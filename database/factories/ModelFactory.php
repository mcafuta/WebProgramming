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

// Tu lahko definiramo kako se nam ustvarjajo neki testni primeri.

$factory->define(App\User::class, function(Faker\Generator $faker) {
    static $password;

    return [
        'name'           => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'password'       => $password ? : $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Status::class, function(Faker\Generator $faker) {
    static $types = [ 'goal', 'income', 'expense' ];

    return [
        'name'    => $faker->word,
        'value'   => $faker->randomFloat(2, 0, 10000),
        'type'    => $types[array_rand($types)],
        'user_id' => 1
    ];
});
