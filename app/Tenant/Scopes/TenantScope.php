<?php

namespace App\Tenant\Scopes;

use App\Tenant\ManagerTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class TenantScope implements Scope

{

    public function apply(Builder $builder, Model $model)
    {

        $builder->where('tenant_id',  app(ManagerTenant::class)->getTenantIdentify());
    }
}
