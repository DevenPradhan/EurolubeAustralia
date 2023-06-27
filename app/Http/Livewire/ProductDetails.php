<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\ProductImage;
use Livewire\Component;

class ProductDetails extends Component
{

    public $product;

    public $newFeatures = [];

    

   
    public function deleteImage($imageId)
    {

        ProductImage::destroy($imageId);
        $this->product = Product::findOrFail($this->product->id);
    }

    public function mount($product_id)
    {
        $this->newFeatures = 
        $this->product = Product::findOrFail($product_id);
    }

    public function render()
    {
        return view('livewire.product-details');
    }

}