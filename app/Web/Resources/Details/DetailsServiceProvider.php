<?php
namespace LaravelDetails\Web\Resources\Details;

use Illuminate\Support\ServiceProvider;

class DetailsServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(
            'LaravelDetails\Web\Resources\Details\Repositories\DetailsRepositoryInterface',
            'LaravelDetails\Web\Resources\Details\Repositories\DetailsRepository'
        );
        $this->app->bind(
            'LaravelDetails\Web\Resources\Details\Services\DetailsServiceInterface',
            'LaravelDetails\Web\Resources\Details\Services\DetailsService'
        );
    }
}