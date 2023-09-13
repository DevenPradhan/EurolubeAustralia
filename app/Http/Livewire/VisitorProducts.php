<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\ProductCategory;
use Livewire\Component;
use DB;

class VisitorProducts extends Component
{
    public $search = '';
    public $categoryId;
    public $categoryCount;

    protected $listeners = ['category-products' => 'mount'];

    public function getProducts($id)
    {

        if($this->categoryId){

          if($this->categoryId == $id){

            $this->categoryId = '';

          } else {

            $this->categoryId = $id;
          }

        } else {
            
            $this->categoryId = $id;

        }

        // dd($this->categoryCount = ProductCategory::where('referencing', $id)->count());
        $this->categoryCount = ProductCategory::where('referencing', $id)->get('id');
        // $this->categoryId = ProductCategory::where('referencing', $id)
        //     ->get('id');

        
    }

    public function mount()
    {
        // $this->products = Product::where('name', 'like',  '%'.$this->search. '%')
        // ->get();
    }
    public function render()
    {
        $this->products = Product::where('name', 'like', '%'. $this->search . '%')
                                    ->get();

        $this->products->when($this->categoryId, function($query) {
            return $query->whereIn('category_id', $this->categoryCount);
        });

            // $this->products = Product::when($this->categoryId, function($query) {
        //     if($this->categoryCount->count() === 0){
        //         return $query->where('category_id', $this->categoryId);
        //     } else {
        //         return $query->whereIn('category_id', $this->categoryId);
        //     }
        // })->get();                

       
        $categories = ProductCategory::where('level', 1)->pluck('name', 'id');

        return view('livewire.visitor-products', compact('categories'));
    }
}