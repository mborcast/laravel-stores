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
$factory->define(
    LaravelStores\Web\Resources\Customers\Customer::class, 
    function (Faker\Generator $faker) {
    return [
        'name' => implode(' ', [$faker->firstName, $faker->lastName])
    ];
});
$factory->define(
    LaravelStores\Web\Resources\Stores\Store::class, 
    function (Faker\Generator $faker) {
    return [
        'name' => $faker->city
    ];
});
$factory->define(
    LaravelStores\Web\Resources\Products\Product::class, 
    function (Faker\Generator $faker) {
    return [
        'name' => $faker->catchPhrase,
        'price' => $faker->randomFloat(2, 50, 1000)
    ];
});
$factory->define(
    LaravelStores\Web\Resources\Sales\Sale::class, 
    function (Faker\Generator $faker) {
    return [
        'store_id' => $faker->numberBetween(1,10),
        'customer_id' => $faker->numberBetween(1,20),
        'date' => $faker->dateTime
    ];
});
$factory->define(
    LaravelStores\Web\Resources\Details\Detail::class, 
    function (Faker\Generator $faker) {
    return [
        'product_id' => $faker->numberBetween(1, 100),
        'sale_id' => function () {
            return factory(LaravelStores\Web\Resources\Sales\Sale::class)->create()->id;
        },
        'units' => $faker->numberBetween(1, 50)
    ];
});
