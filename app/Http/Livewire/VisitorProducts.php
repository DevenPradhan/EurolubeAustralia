<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\ProductCategory;
use Arr;
use Livewire\Component;
use DB;
use Livewire\WithPagination;

class VisitorProducts extends Component
{
    use WithPagination;

    public $search = '';
    public $categoryId;
    public $categoryCount;
    public $searchedCategory;
    public $subCategories;

    protected $listeners = ['category-products' => 'mount'];

    public function getProducts($id)
    {
        
        $this->reset('subCategories');

        if ($this->categoryId) { // if categoryId is already set check if it matches
            if ($this->categoryId == $id) { //if categoryId is equal to the parameter
                $this->categoryId = ''; //reset the categoryId
            } else {
                $this->categoryId = $id; //else set categoryId to the parameter
            }
        } else {
            $this->categoryId = $id; // if unset categoryId set it to parameter
        }

        $this->subCategories = ProductCategory::where('referencing', $id)->get();

        if($this->categoryId == '')
        {
            $this->resetPage();
            $this->reset('searchedCategory');
        }

        if ($this->subCategories->count() == 0) {
            
            $this->searchedCategory = $this->categoryId;
        }

    }

    public function getProductSub($id)
    {
        $this->resetPage();
        $this->reset('searchedCategory');
        $this->searchedCategory = $id;
    }
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        // $products = Product::where('status', 1)->where('name', 'like', '%'. $this->search . '%')->paginate(9);
        
        $products = Product::query();

        $products->where('status', 1);

        if ($this->searchedCategory) {
            $products->where('category_id', $this->searchedCategory);
        }

        $products = $products->where('name', 'like', '%' . $this->search . '%')->paginate(9);

        $categories = ProductCategory::where('level', 1)->pluck('name', 'id');

        return view('livewire.visitor-products', compact('categories', 'products'));
    }
}