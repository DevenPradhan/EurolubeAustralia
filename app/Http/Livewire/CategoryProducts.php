<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\ProductCategory;
use Livewire\Component;

class CategoryProducts extends Component
{
    public ProductCategory $category;
    public function render()
    {
        
        $products = Product::where('category_id', $this->category->id)->get();
        return view('livewire.category-products', compact('products'));
    }
}
