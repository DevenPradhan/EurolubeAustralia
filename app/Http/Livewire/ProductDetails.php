<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductDetails extends Component
{

    public Product $product;

    public function mount()
    {

    }

    // public function read()
    // {
    //     return Product::all();
    // }

    public function render()
    {
        // $product = Product::find($id);
        return view('livewire.product-details');
    }


}