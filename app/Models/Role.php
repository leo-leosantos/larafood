<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'description'];

    // get permissions
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

     // get users
     public function users()
     {
         return $this->belongsToMany(User::class);
     }

    public function permissionsAvailable($filter = null)
    {
        $permissions = Permission::whereNotIn('permissions.id', function($query){
                $query->select('permission_role.permission_id');
                $query->from('permission_role');
                $query->whereRaw("permission_role.role_id={$this->id}");
        })->where(function($queryFilter) use ($filter){
            if($filter)
                $queryFilter->where('permissions.name','LIKE', "%{$filter}%");
        })->paginate();

        return $permissions;
    }


}
