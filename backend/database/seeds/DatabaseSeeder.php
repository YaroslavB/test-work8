<?php

use App\Item;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Item::get()->each(function (Item $item) {
            $item->delete();
        });
        factory(\App\Category::class, 10)->create();
    }
}
