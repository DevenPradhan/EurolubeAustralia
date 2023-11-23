<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\ProductFeature;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductDetails extends Component
{
    use WithFileUploads;
    public Product $product;
    public $productImage;
    public $featureId;
    public $featured = false;
    public $productQuantity;
    public $imageModal = false;
    public $trixModal = false;
    public $detailsModal = false;
    public $partNo;
    public $weight;
    public $dimensions;
    public $productFeature;
    public $productDescription;
    public $description = 'show_description';

    public function updated($field)
    {
        $this->validateOnly($field, [
            'productImage' => 'image|mimes:jpg,jpeg,png|max:1024'

        ]);
    }

    public function openImageModal()
    {
        $this->reset('productImage');
        $this->imageModal = true;
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


    // called from uploadImage function
    private function deleteImage()
    {
        foreach ($this->product->images as $image) {
            Storage::delete('/products/images/' . $image->url);
            $image->delete();
        }

    }

    public function changeStatus($status)
    {
        if($this->product->images()->count() < 1){
            $this->imageModal = true;
        }else{
            $this->product->update([
                'status' => $status
            ]);
            $this->product->refresh();
            $this->emit('status-changed');
        }
       
    }

    public function changeQuantity()
    {
        $this->product->update(['quantity' => $this->productQuantity]);
        $this->product->refresh();
        $this->emit('quantity-changed');
    }

    public function addFeature()
    {
        $this->reset('productFeature', 'featured');
        $this->trixModal = true;
    }

    public function editFeature($id)
    {
        $this->reset('featureId', 'featured');
        $this->featureId = $id;
        $feature = ProductFeature::find($id);
        $this->productFeature = $feature->feature;
        $additional = $feature->additional;
        if ($additional == 1) {
            $this->featured = true;
        }
        $this->trixModal = true;
    }

    public function createFeature()
    {
        $this->validate([
            'productFeature' => 'required'
        ]);

        if($this->featured){
            $this->product->features()->update([
                'additional' => 0
            ]);
        }

        $this->product->features()->create([
            'feature' => $this->productFeature,
            'additional' => $this->featured
        ]);

        $this->trixModal = false;
        $this->product->refresh();
    }

    public function saveEditFeature()
    {
        
        $this->validate([
            'productFeature' => 'required'
        ]);

        if($this->featured){
            $this->product->features()->update([
                'additional' => 0
            ]);
        }

        $this->product->features()->find($this->featureId)->update([
            'feature' => $this->productFeature,
            'additional' => $this->featured
        ]);
        
        $this->trixModal = false;
        $this->product->refresh();
    }

    public function deleteFeature($id)
    {
        $this->product->features()->find($id)->delete();

        $this->product->refresh();
    }

    public function openDetailsModal()
    {
        $this->reset('partNo', 'weight', 'dimensions');
        $this->partNo = $this->product->details->part_no;
        $this->dimensions = $this->product->details->dimensions;
        $this->weight = $this->product->details->weight;
        $this->detailsModal = true;
    }

    public function saveDetails()
    {
        $this->validate([
            'partNo' => 'max:20|unique:product_details,part_no',
            'dimensions' => 'max:20',
            'weight' => 'max:20'
        ], [
            'partNo' => 'There is already a product with the unique part no.'
        ]);

        $this->product->details()->update([
            'part_no' => $this->partNo,
            'dimensions' => str_replace('*', 'x', $this->dimensions),
            'weight' => $this->weight
        ]);

        $this->product->refresh();
        $this->detailsModal = false;
    }

    public function editDescription()
    {
        $this->productDescription = $this->product->description;
        $this->description = 'edit_description';
    }

    public function saveDescription()
    {

        $this->validate([
            'productDescription' => 'max:255'
        ]);

        $this->product->update([
            'description' => $this->productDescription
        ]);

        $this->description = 'show_description';
    }

    public function render()
    {
        #
        $this->productQuantity = $this->product->quantity;
        $statuses = collect(['Inactive', 'Active', 'Archived']);

        return view('livewire.admin.product-details', compact('statuses'));
    }
}