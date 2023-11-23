<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class ProductCategory extends Model
{
    use HasFactory;

    // public function getRouteKeyName(){
    //     return 'name';
    // }

    protected $table = 'product_categories';

    protected $fillable = ['id', 'level', 'name', 'referencing'];

   
    public function images():MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }
   
}
