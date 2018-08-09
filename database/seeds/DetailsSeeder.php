<?php
use Illuminate\Database\Seeder;

class DetailsSeeder extends Seeder {
    public function run() {
        $faker = Faker\Factory::create();
        factory(LaravelStores\Web\Resources\Details\Detail::class, 100)->create();
    }
}