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

    protected $listeners = ['category-products' => 'mount'];

    public function getProducts($id)
    {

        if ($this->categoryId) {
            if ($this->categoryId == $id) {
                $this->categoryId = '';
            } else {
                $this->categoryId = $id;
            }
        } else {
            $this->categoryId = $id;
        }

        $this->categoryCount = ProductCategory::where('referencing', $id)
            ->orWhere('id', $id)
            ->get('id');


    }

    public function render()
    {
        $products = Product::where('name', 'like', '%'.$this->search. '%')->get();
        $ids = $products->pluck('id')->flatten();

        if($this->categoryId){
            $products = Product::whereIn('category_id', $this->categoryCount)->get();
        }
        

        // if($this->search)
        // {
        //     // $products->where('name', 'like', '%'. $this->search. '%');
        // }

        

        $categories = ProductCategory::where('level', 1)->pluck('name', 'id');

        return view('livewire.visitor-products', compact('categories', 'products'));
    }
}