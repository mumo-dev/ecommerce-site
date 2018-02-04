<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Category::class, function (Faker $faker){
    return [
        'name'=>$faker->word
    ] ;
 });

 $factory->define(App\Product::class,function (Faker $faker){
    return[
        'category_id'=>App\Category::all()->random()->id,
        'name'=>$faker->word,
        'quantity'=>$faker->randomNumber(2),
        'description' => $faker->sentence(),
        'details' => $faker->text(),
        'price'=>$faker->numberBetween(100,2500)
    ];
});
$factory->define(App\Image::class, function (Faker $faker) {
    return [
        'image_url'=>$faker->randomElement(['photo1.jpg','photo2.jpg','photo3.jpg','photo4.jpg',
            'photo5.jpg','photo6.jpg','photo7.jpg','photo8.jpg','photo9.jpg','photo10.jpg',
            'photo11.jpg','photo12.jpg','photo13.jpg','photo14.jpg','photo15.jpg','photo16.jpg','photo17.jpg']),
        'product_id'=>App\Product::all()->random()->id
    ];
});

$factory->define(App\Review::class, function (Faker $faker){
    return [
        'user_id'=>App\User::all()->random()->id,
        'product_id'=>App\Product::all()->random()->id,
        'review'=>$faker->sentence()
    ];
});
