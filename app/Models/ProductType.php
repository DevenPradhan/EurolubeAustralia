<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductType extends Model
{
    use HasFactory;

    protected $table = 'product_types';
    protected $fillable = ['product_category_id', 'name'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
