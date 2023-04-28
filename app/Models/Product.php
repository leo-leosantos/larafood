<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Tenant\Traits\TenantTrait;

class Product extends Model
{

    use TenantTrait;

    protected $fillable = ['title', 'flag','description', 'price', 'image'];


    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
