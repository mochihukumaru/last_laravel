<?php

use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'gender' => $faker->numberBetween(1, 3),
        'email' => $faker->email,
        'tell' => $faker->numerify('###########'),
        'address' => $faker->address,
        'building' => $faker->buildingNumber,
        'detail' => $faker->text(120),
        'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
    ];
});