<?php
use Illuminate\Database\Seeder;

class CustomersSeeder extends Seeder {
    public function run() {
        factory(LaravelStores\Web\Resources\Customers\Customer::class, 20)->create();
    }
}