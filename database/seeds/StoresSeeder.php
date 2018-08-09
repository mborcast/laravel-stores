<?php
use Illuminate\Database\Seeder;

class StoresSeeder extends Seeder {
    public function run() {
        factory(LaravelStores\Web\Resources\Stores\Store::class, 10)->create();
    }
}