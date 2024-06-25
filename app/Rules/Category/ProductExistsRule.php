<?php

namespace App\Rules\Category;

use App\Models\Product;
use App\Models\ProductDetail;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ProductExistsRule implements ValidationRule
{
    public $partNo;

    public function __construct($partNo){
        $this->partNo = $partNo;
    }
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(ProductDetail::where('part_no', 'like', '%'.$value.'%')
                    ->exists()){
            $fail('There is already a product with the same Part No.');
        }

        // if(Product::where('category_id', $this->category)
        //             ->where('name', 'like', '%'.$value.'%')
        //             ->exists()){
        //     $fail('There is already a product in this Category Range with the same name');
        // }
    }
}
