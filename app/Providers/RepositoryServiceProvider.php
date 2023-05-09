<?php

namespace App\Providers;

use App\Repositories\Contracts\{
    TenantRepositoryInterface,
    CategoryRepositoryInterface,
    TableRepositoryInterface,
    ProductRepositoryInterface,
    ClientRepositoryInterface,
    OrderRepositoryInterface,
};
use App\Repositories\{
    TenantRepository,
    CategoryRepository,
    TableRepository,
    ProductRepository,
    ClientRepository,
    OrderRepository,
};
use App\Services\OrderService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            TenantRepositoryInterface::class,
            TenantRepository::class
        );
        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );
        $this->app->bind(
            TableRepositoryInterface::class,
            TableRepository::class
        );
        $this->app->bind(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );
        $this->app->bind(
            ClientRepositoryInterface::class,
            ClientRepository::class
        );
        $this->app->bind(
            OrderRepositoryInterface::class,
            OrderRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
