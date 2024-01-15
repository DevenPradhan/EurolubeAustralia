<?php

namespace App\Rules\Category;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ProductExistsRule implements ValidationRule
{
    public $category;

    public function __construct($category){
        $this->category = $category;
    }
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(Product::where('category_id', $this->category)
                    ->where('name', 'like', '%'.$value.'%')
                    ->exists()){
            $fail('There is already a product in this Category Range with the same name');
        }
    }
}
