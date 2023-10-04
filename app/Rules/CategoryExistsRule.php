<?php

namespace App\Rules;

use App\Models\ProductCategory;
use Closure;
use Illuminate\Contracts\Validation\Rule;

class CategoryExistsRule implements Rule
{
    protected $categoryForEdit;
    protected $upCategory;

    public function __construct($categoryForEdit, $upCategory)
    {
        $this->categoryForEdit = $categoryForEdit;
        $this->upCategory = $upCategory;
    }
    public function passes($attribute, $value)
    {
        
        return !ProductCategory::where('referencing', '!=', $this->categoryForEdit->referencing)
                ->where('referencing', $value)
                ->where('name', 'like', '%' . $this->categoryForEdit->name . '%')
                ->exists();
    }

    public function message()
    {
        return 'There is already a Sub Category with the same name in this Category';
    }
}
