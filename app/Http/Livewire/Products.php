<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Products extends Component
{

    public $newProducts = [];

    public function mount()
    {
        $this->newProducts = [
            ['name' => '', 'quantity' => 1]
        ];
    }

    public function addProduct()
    {
        $this->newProducts[] = ['name' => '', 'quantity' => 1];
    }

    public function removeProduct($id)
    {
        unset($this->newProducts[$id]);
        array_values($this->newProducts);
    }

    public function render()
    {

        return view('livewire.products');
    }
}