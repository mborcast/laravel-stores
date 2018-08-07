<?php
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder {
    public function run() {
        factory(LaravelStores\Web\Resources\Products\Product::class, 100)->create();
    }
}