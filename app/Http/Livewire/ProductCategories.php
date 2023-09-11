<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\ProductCategory;
use Livewire\Component;

class ProductCategories extends Component
{
    public $categoryId;
    public $password;
    public $deleteModal = false;

    public function getSubCategories($id)
    {
        $this->categories = ProductCategory::where('referencing', $id)->get();
        if($this->categories->count() == 0){
            return to_route('category-products', $id);
        }
    }
    public function openDeleteModal($id)
    {
        $this->reset();
        $this->categoryId = $id;
        $this->deleteModal = true;
    }

    public function confirmDeleteCategory()
    {
        $this->validate([
            'password' => 'required|current-password'
        ]);

        ProductCategory::destroy($this->categoryId);
        ProductCategory::where('referencing', $this->categoryId)->delete();

        $this->deleteModal = false;
    }

    public function mount()
    {
        $this->categories = ProductCategory::where('level', 1)->get();
    }

    public function render()
    {
       
        return view('livewire.product-categories');
    }
}