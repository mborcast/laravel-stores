<?php
namespace LaravelStores\Web\Resources\Sales;

use Illuminate\Support\ServiceProvider;

class SalesServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(
            'LaravelStores\Web\Resources\Sales\Repositories\SalesRepositoryInterface',
            'LaravelStores\Web\Resources\Sales\Repositories\SalesRepository'
        );
        $this->app->bind(
            'LaravelStores\Web\Resources\Sales\Services\SalesServiceInterface',
            'LaravelStores\Web\Resources\Sales\Services\SalesService'
        );
    }
}