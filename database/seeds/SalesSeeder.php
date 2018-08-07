<?php
use Illuminate\Database\Seeder;

class SalesSeeder extends Seeder {
    public function run() {
        factory(LaravelStores\Web\Resources\Sales\Sale::class, 10)->create();
    }
}