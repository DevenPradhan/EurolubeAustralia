<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSource extends Model
{
    use HasFactory;

    protected $table = 'product_source';

    protected $fillable = ['id', 'level', 'name', 'referencing'];
}
