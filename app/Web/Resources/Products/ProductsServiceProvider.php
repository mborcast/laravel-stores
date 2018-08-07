<?php
namespace LaravelStores\Web\Resources\Products;

use Illuminate\Support\ServiceProvider;

class ProductsServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(
            'LaravelStores\Web\Resources\Products\Repositories\ProductsRepositoryInterface',
            'LaravelStores\Web\Resources\Products\Repositories\ProductsRepository'
        );
        $this->app->bind(
            'LaravelStores\Web\Resources\Products\Services\ProductsServiceInterface',
            'LaravelStores\Web\Resources\Products\Services\ProductsService'
        );
    }
}