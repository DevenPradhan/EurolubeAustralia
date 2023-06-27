<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\ProductType;
use Livewire\Component;

class Products extends Component
{

    public $types;
    public $newProducts = [];
    public $search ='';
    protected $queryString = ['search'];

    public function mount()
    {
        $this->types = ProductType::all();
        $this->newProducts = [
            ['name' => '', 'quantity' => 1, 'product_type' => '']
        ];
    }

    public function addProduct()
    {
        $this->newProducts[] = ['name' => '', 'quantity' => 1, 'product_type' => ''];
    }

    public function removeProduct($id)
    {
        unset($this->newProducts[$id]);
        array_values($this->newProducts);
    }

    public function render()
    {
        // $products= Product::all();
        $products = Product::where('name', 'like', '%'.$this->search.'%')->paginate(10);
        return view('livewire.products', ['products' => $products]);
    }
}