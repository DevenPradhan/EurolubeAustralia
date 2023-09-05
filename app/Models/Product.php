<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;


    protected $table = 'products';
    protected $fillable = [
        'id',
        'name',
        'description',
        'quantity',
        'status',
        'category_id'
    ];

      public function details()
    {
        return $this->hasOne(ProductDetail::class);
    }

    public function features()
    {
        return $this->hasMany(ProductFeature::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}