<?php

namespace App\Http\Livewire;

use App\Models\ProductType;
use Livewire\Component;

class Products extends Component
{

    public $newProducts = [];

    public function mount()
    {
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


    public function types()
    {
        return ProductType::all();
    }

    public function render()
    {

        return view('livewire.products', ['types' => $this->types()]);
    }
}