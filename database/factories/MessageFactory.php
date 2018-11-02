<?php

use Faker\Generator as Faker;

$factory->define(App\Message::class, function (Faker $faker) {
    return [
        /*'content' => $faker->words(5,true),
        'content' => $faker->word,
        'content' => $faker->paragraph,*/
        'content' => $faker->realText(),
        'image'=>$faker->imageUrl(600,338),
        'created_at'=>$faker->dateTimeThisDecade,
        'updated_at'=>$faker->dateTimeThisDecade,
    ];
});
$factory->define(App\Response::class, function (Faker\Generator $faker) {
    return [
        'message' => $faker->words(3, true),
        'created_at' => $faker->dateTimeThisYear,
        'updated_at' => $faker->dateTimeThisYear,
    ];
});