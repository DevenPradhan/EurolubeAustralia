<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductDetails extends Component
{
    use WithFileUploads;
    public Product $product;
    public $productImage;
    public $productQuantity;
    public $imageModal = false;

    public function openImageModal()
    {
        $this->reset('productImage');
        $this->imageModal = true;
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'productImage' => 'image|mimes:jpg,jpeg,png|max:1024'
        ]);
    }

    public function uploadImage()
    {

        $this->validate([
            'productImage' => 'image|mimes:jpg,jpeg,png|max:1024'
        ]);

        if ($this->product->images()->count() > 0) {
            $this->deleteImage();
        }

        $image_url = $this->productImage->getClientOriginalName();
        
        Storage::putFileAs('products/images/', $this->productImage, $image_url);
        
        $this->product->images()->create([
            'url' => $image_url
        ]);

        $this->product->refresh();
        $this->imageModal = false;
    }


    // called from uploadImage function line 38;
    private function deleteImage() 
    {
        foreach ($this->product->images as $image) {
            Storage::delete('/products/images/' . $image->url);
            $image->delete();
        }

    }

    public function changeStatus($status)
    {
        $this->product->update([
            'status' => $status
        ]);
        $this->product->refresh();
        $this->emit('status-changed');
    }

    public function changeQuantity()
    {
        $this->product->update(['quantity' => $this->productQuantity]);
        $this->product->refresh();
        $this->emit('quantity-changed');
    }

    public function render()
    {
        $this->productQuantity = $this->product->quantity;
        $statuses = collect(['Inactive', 'Active', 'Archived']);

        return view('livewire.admin.product-details', compact('statuses'));
    }
}