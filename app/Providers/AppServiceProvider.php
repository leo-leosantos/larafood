<?php

namespace App\Providers;

use App\Models\{
    Plan,
    Tenant,
    Category,
    Product
};
use App\Observers\{
    PlanObserver,
    TenantObserver,
    CategoryObserver,
    ProductObserver
};
use App\Repositories\Contracts\{
    TenantRepositoryInterface,
};
use App\Repositories\{
    TenantRepository,
};
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
            $this->app->bind(
                TenantRepositoryInterface::class,
                TenantRepository::class
            );
    }


    public function boot()
    {
        Plan::observe(PlanObserver::class);
        Tenant::observe(TenantObserver::class);
        Category::observe(CategoryObserver::class);
        Product::observe(ProductObserver::class);

    }
}
