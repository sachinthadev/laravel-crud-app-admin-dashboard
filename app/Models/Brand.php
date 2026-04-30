<?php

namespace App\Models;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'id',
        'brand_name',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id', 'id');
    }
}
