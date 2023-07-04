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

    public $product;
    public $name;
    public $quantity;
    public $part_no;
    public $manual;
    public $weight;
    public $dimensions;

    public $newFeatures = [];

    public function updated($field)
    {
        $this->validateOnly($field, [
            'name' => 'required|unique:products,name,'.$this->name.'',
            'part_no' => 'unique:product_details,part_no,'.$this->product->details->id.'',
            'manual' => 'file|max:1024',
            'weight' => 'max:40',
            'dimensions' => 'max:40'
        ]);
    }

    public function deleteImage($imageId)
    {
        $image_url = ProductImage::where('id', $imageId)->value('image_url');
        ProductImage::destroy($imageId);
        Storage::delete('images/'.$image_url);
        $this->product = Product::findOrFail($this->product->id);
    }

    public function mount($product_id)
    {
        $this->reset();
        $this->product = Product::findOrFail($product_id);
        $this->name = $this->product->name;
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

}