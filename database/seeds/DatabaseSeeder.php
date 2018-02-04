<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,5)->create();
        factory(App\Category::class,10)->create();
        factory(App\Product::class,50)->create();
        factory(App\Image::class,20)->create();
        factory(App\Review::class,100)->create();
    }
}
