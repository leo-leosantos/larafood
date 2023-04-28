<?php

namespace App\Providers;

use App\Models\{
    Plan,
    Tenant,
    Category
};
use App\Observers\{
    PlanObserver,
    TenantObserver,
    CategoryObserver
};

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {

    }


    public function boot()
    {
        Plan::observe(PlanObserver::class);
        Tenant::observe(TenantObserver::class);
        Category::observe(CategoryObserver::class);

    }
}
