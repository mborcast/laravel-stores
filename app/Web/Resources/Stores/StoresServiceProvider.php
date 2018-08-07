<?php
namespace LaravelStores\Web\Resources\Stores;

use Illuminate\Support\ServiceProvider;

class StoresServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(
            'LaravelStores\Web\Resources\Stores\Repositories\StoresRepositoryInterface',
            'LaravelStores\Web\Resources\Stores\Repositories\StoresRepository'
        );
        $this->app->bind(
            'LaravelStores\Web\Resources\Stores\Services\StoresServiceInterface',
            'LaravelStores\Web\Resources\Stores\Services\StoresService'
        );
    }
}