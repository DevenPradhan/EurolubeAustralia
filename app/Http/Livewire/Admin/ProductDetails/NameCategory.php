<?php

namespace App\Http\Livewire\Admin\ProductDetails;

use App\Models\Product;
use App\Models\ProductCategory;
use Livewire\Component;

class NameCategory extends Component
{
    public Product $product;
    public $name;
    public $category;
    
    protected $listeners = ['categorySelected']; 
    //from another livewire component(EditCategories)

    public function categorySelected($id)
    {
        $this->product->update([
            'category_id' => $id
        ]);
        $this->emit('category-selected');
    }


    public function changeName()
    {
        $this->product->update([
            'name' => $this->name
        ]);
        $this->emit('name-changed'); 
    }
    public function render()
    {
        $this->category = ProductCategory::find($this->product->category_id);
        // $this->category = ProductCategory::where('id', $this->product->category_id)->value('name');
        $this->name = $this->product->name;    
        return view('livewire.admin.product-details.name-category');
    }
}
