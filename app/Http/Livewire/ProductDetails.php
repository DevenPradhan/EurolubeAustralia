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

    public function details($id)
    {
        return Product::find($id);
    }

    public function render($id)
    {
        // $product = Product::find($id);
        return view('livewire.product-details', ['details' => $this->details($id)]);
    }

}