<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductFeature extends Model
{
    use HasFactory;

    protected $table = 'product_features';
    protected $fillable = [
        'id', 
        'product_id', 
        'dimensions', 
        'max_air_pressure', 
        'weight', 
        'air_inlet', 
        'outlet', 
        'capacity', 
        'pump_tube', 
        'seals' 
        ];

        public function product():BelongsTo
        {
            return $this->belongsTo(Product::class);
        }
}