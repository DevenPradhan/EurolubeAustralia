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

    public function category()
    {

        return $this->belongsTo(ProductCategory::class);
    }
}