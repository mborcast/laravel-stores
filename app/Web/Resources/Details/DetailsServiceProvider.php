<?php
namespace LaravelStores\Web\Resources\Details;

use Illuminate\Support\ServiceProvider;

class DetailsServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(
            'LaravelStores\Web\Resources\Details\Repositories\DetailsRepositoryInterface',
            'LaravelStores\Web\Resources\Details\Repositories\DetailsRepository'
        );
        $this->app->bind(
            'LaravelStores\Web\Resources\Details\Services\DetailsServiceInterface',
            'LaravelStores\Web\Resources\Details\Services\DetailsService'
        );
    }
}