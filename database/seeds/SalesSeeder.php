<?php
use Illuminate\Database\Seeder;

class SalesSeeder extends Seeder {
    public function run() {
        $faker = Faker\Factory::create();
        factory(LaravelStores\Web\Resources\Sales\Sale::class, 300)->create();
    }
}