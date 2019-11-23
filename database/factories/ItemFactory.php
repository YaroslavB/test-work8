<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use Faker\Generator as Faker;
use Illuminate\Http\UploadedFile;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'description' => $faker->text
    ];
});

$factory->afterMaking(Item::class, function (Item $item, Faker $faker) {
    $item->saveImage(UploadedFile::fake()->image($faker->name . '.jpg'));
});
