<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $table;

    public function __construct( )
    {
        $this->table = 'categories';
    }

    public function getCategoriesByTenantUuid(string $uuid)
    {
       return  DB::table($this->table)->join('tenants','tenants.id', '=', 'categories.tenant_id')
                            ->where('tenants.uuid', $uuid)
                            ->select('categories.*')->get();
    }

    public function getCategoriesByTenantId(int $idTenant)
    {
       return  DB::table($this->table)->where('tenant.id', $idTenant)->get();
    }


     public function  getCategoryByUuid(string $uuid)
     {
        return  DB::table($this->table)->where('uuid', $uuid)->first();
    }

}
