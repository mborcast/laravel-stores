<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // $this->call(CustomersSeeder::class);
        // $this->call(ProductsSeeder::class);
        // $this->call(StoresSeeder::class);
        // $this->call(SalesSeeder::class);
        $this->call(DetailsSeeder::class);
    }
}
