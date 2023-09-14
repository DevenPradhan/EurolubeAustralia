<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\ProductCategory;
use Livewire\Component;

class ProductCategories extends Component
{
    public $categoryId;
    public $deleteId;
    public $password;
    public $deleteModal = false;

    public function getSubCategories($id)
    {
        $this->categoryId = $id;
        if (ProductCategory::where('referencing', $id)->count() == 0) {
            return to_route('category-products', $id);
        }
    }
    public function openDeleteModal($id)
    {
        $this->reset('password');
        $this->deleteId = $id;
        $this->deleteModal = true;
    }

    public function confirmDeleteCategory()
    {
        $this->validate([
            'password' => 'required|current-password'
        ]);

        ProductCategory::destroy($this->deleteId);
        ProductCategory::where('referencing', $this->deleteId)->delete();

        $this->deleteModal = false;
    }

    public function render()
    {
        $categories = ProductCategory::query();

        if ($this->categoryId) {
            $categories->where('referencing', $this->categoryId);
        } else {
            $categories->where('level', 1);
        }
        $categories = $categories->get();

        return view('livewire.product-categories', compact('categories'));
    }
}