<?php

namespace App\Http\Livewire\Guest;

use App\Models\Product;
use App\Models\ProductCategory;
use Livewire\Component;

class CategoriesProducts extends Component
{
    public $categoryProduct;

    public function getProducts($categoryId)
    {

        $this->categoryProduct = ProductCategory::where('referencing', $categoryId)->get();
        if ($this->categoryProduct->count() == 0) {
            $this->categoryProduct = Product::where('category_id', $categoryId)->get();
        }
    }

    public function mount()
    {
        $this->categoryProduct = ProductCategory::where('level', 1)->get();
    }
    public function render()
    {


        $categories = ProductCategory::where('level', 1)->get();
        return view('livewire.guest.categories-products', compact('categories'));
    }
}
