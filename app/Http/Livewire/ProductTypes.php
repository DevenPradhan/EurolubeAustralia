<?php

namespace App\Http\Livewire;

use App\Models\ProductCategory;
use App\Models\ProductType;
use Livewire\Component;

class ProductTypes extends Component
{
    public $search;
    public $categories;
    public $newTypes = [];

    public function mount()
    {
        $this->categories = ProductCategory::pluck('name', 'id');
        $this->newTypes = [
            ['name' => '', 'category' => '', 'description']
        ];
    }

    public function addType()
    {
        $this->newTypes[] = ['name' => '', 'category' => '',  'description' => ''];
    }

    public function removeType($id)
    {
        unset($this->newTypes[$id]);
        array_values($this->newTypes);
    }

    public function render()
    {
        $product_types = ProductType::where('name', 'like', '%'.$this->search.'%')
                        ->get();
        return view('livewire.product-types', ['product_types' => $product_types]);
    }
}
