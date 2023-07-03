<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\ProductImage;
use Livewire\Component;

class ProductDetails extends Component
{

    public $product;
    public $quantity;
    public $part_no;
    public $manual;
    public $weight;
    public $dimensions;

    public $newFeatures = [];

    

   
    public function deleteImage($imageId)
    {

        ProductImage::destroy($imageId);
        $this->product = Product::findOrFail($this->product->id);
    }

    public function deleteDescription($productId)
    {
        Product::where('id', $productId)->update(['description' => '']);
        $this->product = Product::findOrFail($this->product->id);

    }

    public function mount($product_id)
    {
        // $this->newFeatures = 
        $this->product = Product::findOrFail($product_id);
        $this->quantity = $this->product->quantity;
        $this->part_no = $this->product->details->part_no;
        $this->weight = $this->product->details->weight;
        $this->manual = $this->product->details->manual;
        $this->dimensions = $this->product->details->dimensions;
    }

    public function render()
    {
        return view('livewire.product-details');
    }

    public function editDetails($product_id)
    {
        dd($product_id);
    }

}