<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Livewire\Component;
use Storage;

class ProductDetails extends Component
{
    use WithFileUploads;

    public $image_url = '';
    public $product;
    public $newFeatures = [];


    public function mount($product_id)
    {
        $this->product = Product::findOrFail($product_id);
    }

    public function changeValidity($product)
    {
        if ($product['validity'] == 0) {
            Product::where('id', $product['id'])->update(['validity' => 1]);

        }
        if($product['validity'] == 1) {
            Product::where('id', $product['id'])->update(['validity' => 0]);
        }
        $this->product = Product::findOrFail($product['id']);
    }

    public function deleteImage($imageId)
    {
        $image_url = ProductImage::where('id', $imageId)->value('image_url');
        ProductImage::destroy($imageId);
        Storage::delete('images/' . $image_url);
        $this->product = Product::findOrFail($this->product->id);
    }

    

    public function render()
    {
        return view('livewire.product-details');
    }

}