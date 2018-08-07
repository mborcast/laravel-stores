<?php
use Illuminate\Database\Seeder;

class DetailsSeeder extends Seeder {
    public function run() {
        factory(LaravelStores\Web\Resources\Details\Detail::class, 10)->create();
    }
}