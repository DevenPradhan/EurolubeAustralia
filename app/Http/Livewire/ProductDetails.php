<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductDetails extends Component
{

    public $product_id;

    // public function mount()
    // {

    // }

    public function mount($id)
    {
        return Product::find($id);
    }

    public function render()
    {
        // $product = Product::find($id);
        return view('livewire.product-details');
    }

}