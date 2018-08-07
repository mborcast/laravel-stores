<?php
namespace LaravelStores\Web\Resources\Customers;

use Illuminate\Support\ServiceProvider;

class CustomersServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(
            'LaravelStores\Web\Resources\Customers\Repositories\CustomersRepositoryInterface',
            'LaravelStores\Web\Resources\Customers\Repositories\CustomersRepository'
        );
        $this->app->bind(
            'LaravelStores\Web\Resources\Customers\Services\CustomersServiceInterface',
            'LaravelStores\Web\Resources\Customers\Services\CustomersService'
        );
    }
}