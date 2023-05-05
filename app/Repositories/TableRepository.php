<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Repositories\Contracts\TableRepositoryInterface;

class TableRepository implements TableRepositoryInterface
{
    protected $table;

    public function __construct( )
    {
        $this->table = 'tables';
    }

    public function getTablesByTenantUuid(string $uuid)
    {
       return  DB::table($this->table)->join('tenants','tenants.id', '=', 'tables.tenant_id')
                            ->where('tenants.uuid', $uuid)
                            ->select('tables.*')->get();
    }

    public function getTablesByTenantId(int $idTenant)
    {
       return  DB::table($this->table)->where('tenant.id', $idTenant)->get();
    }


     public function  getTableByIdentify(string $identify)
     {
         $table =  DB::table($this->table)->where('identify', $identify)->first();

         return $table;
    }

}
