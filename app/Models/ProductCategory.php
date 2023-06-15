<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = 'product_categories';
    protected $fillable = ['id', 'name', 'validity', 'description'];

   public function product_types()
   {
     return $this->hasMany(ProductType::class);
   }

   public function images()
   {
    return $this->morphMany(Image::class, 'imageable');
   }
}
