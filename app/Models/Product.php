<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;


    protected $table = 'products';
    protected $fillable = [
        'id',
        'product_type_id',
        'name',
        'description',
        'quantity',
        'validity'
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }

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