<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});

$factory->afterCreating(\App\Category::class, function (\App\Category $category, Faker $faker) {
    foreach (factory(App\Item::class, 5)->make() as $item) {
        $category->items()->save($item);
    }
});
