<?php

namespace App\Providers;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\ProductRepository;
use App\Services\Interfaces\PipelineServiceInterface;
use App\Services\Interfaces\ProductServiceInterface;
use App\Services\PipelineService;
use App\Services\ProductService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(ProductServiceInterface::class, ProductService::class);
        $this->app->bind(PipelineServiceInterface::class, PipelineService::class);
    }

    /**
     * Bootstrap any application services
     * @return void
     */
    public function boot(): void
    {
        // Your Code Here...
    }
}
