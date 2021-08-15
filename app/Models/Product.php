<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "product";
    protected $fillable = [
        'store_id',
        'name',
    ];

    public function store()
    {
        return $this->hasOne(Store::class,'id','store_id')
                    ->select(['id as store_id','store as name_store']);
    }

    public function variant()
    {
        return $this->hasMany(ProductVariant::class,'parent_id', 'id')
                    ->select(['id','parent_id','name']);
    }
}
