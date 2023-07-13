<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\ProductType;
use Livewire\Component;

class Products extends Component
{
    public $newProducts = [];
    public $search ='';
    protected $queryString = ['search'];

    public function mount()
    {
        $this->newProducts = [
            ['name' => '', 'part_no' => '', 'quantity' => 1, 'product_type' => '']
        ];
    }

    public function addProduct()
    {
        $this->newProducts[] = ['name' => '', 'part_no' => '', 'quantity' => 1, 'product_type' => ''];
    }

    public function removeProduct($id)
    {
        unset($this->newProducts[$id]);
        array_values($this->newProducts);
    }

    public function cancelModal()
    {
        $this->reset();
        $this->newProducts = [
            ['name' => '', 'part_no' => '', 'quantity' => 1, 'product_type' => '']
        ];
    }

    public function render()
    {
        $types = ProductType::pluck('name', 'id');
        $products = Product::where('name', 'like', '%'.$this->search.'%')->paginate(10);
        return view('livewire.products', compact('products', 'types'));
    }
}