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
        'category',
        'name',
        'quantity',
        'validity'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function detail()
    {
        return $this->hasOne(ProductDetail::class);
    }

    public function features()
    {
        return $this->hasOne(ProductFeature::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}