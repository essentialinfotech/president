<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
    public function multi_photos()
    {
        return $this->hasMany(ProductMultiPhoto::class);
    }
    public function product_variants()
    {
        return $this->hasMany(ProductVariant::class);
    }
}
