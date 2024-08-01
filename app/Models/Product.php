<?php

namespace App\Models;
use App\Models\Brand;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'title',
        'category',
        'price',
        'brand_id',

    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
