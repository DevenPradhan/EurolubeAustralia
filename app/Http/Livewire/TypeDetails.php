<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\ProductType;
use Livewire\Component;
use Livewire\WithPagination;

class TypeDetails extends Component
{
    use WithPagination;
    public $type;
    public $newProducts = [];
    public function mount($type_id)
    {
        $this->type = ProductType::findOrFail($type_id);
        $this->newProducts = [
            ['name' => '', 'part_no' => '', 'quantity' => 1]
        ];
    }
    public function addProduct()
    {
        $this->newProducts[] = ['name' => '', 'part_no' => '', 'quantity' => 1 ];
    }

    public function removeProduct($id)
    {
        unset($this->newProducts[$id]);
        array_values($this->newProducts);
    }

    public function deleteProduct($product_id)
    {
        Product::destroy($product_id);
        $this->type = ProductType::findOrFail($this->type->id);
    }

    
    public function render()
    {
        return view('livewire.type-details');
    }
}
