<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Rules\Category\ProductExistsRule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Storage;

class Details extends Component
{
    use WithFileUploads;
    public $categoryImage;
    public ProductCategory $category;
    public $imageModal = false;
    public $productModal = false;
    public $newProduct;
    public $productName;
    public $productDescription;
    public $productQuantity = 1;

    public function updated($field)
    {
        $this->validateOnly($field, [
            'categoryImage' => 'image|mimes:jpg,jpeg,png|max:1024'

        ]);
    }

    public function addProductModal()
    {
        $this->reset('productName', 'productDescription', 'productQuantity');
        $this->productModal = true;
    }

    public function addProductFunction()
    {
        $this->validate([
            'productName' => ['required', new ProductExistsRule($this->category->id)]
        ]);

        $this->newProduct = Product::create([
            'name' => $this->productName,
            'description' => $this->productDescription,
            'quantity' => $this->productQuantity,
            'status' => 0,
            'category_id' => $this->category->id
        ]);

        $this->newProduct->details()->create();
        $this->emit('product-saved');

    }

    public function closeAddProductModal()
    {
        $this->productModal = false;
    }

    public function viewProductModal()
    {
        return redirect()
            ->route('products.show', $this->newProduct->id)
            ->with('success', 'product created, Please edit the details before publishing');
    }

    public function openImageModal()
    {
        $this->reset('categoryImage');
        $this->imageModal = true;
    }

    public function uploadImage()
    {

        $this->validate([
            'categoryImage' => 'image|mimes:jpg,jpeg,png|max:1024'
        ]);

        if ($this->category->images()->count() > 0) {
            $this->deleteImage();
        }

        $image_url = $this->categoryImage->getClientOriginalName();

        Storage::putFileAs('categories/images/', $this->categoryImage, $image_url);

        $this->category->images()->create([
            'url' => $image_url
        ]);

        $this->category->refresh();
        $this->imageModal = false;
    }

    private function deleteImage()
    {
        foreach ($this->category->images as $image) {
            Storage::delete('/categories/images/' . $image->url);
            $image->delete();
        }

    }

    public function render()
    {

        $products = Product::where('category_id', $this->category->id)->orderBy('name', 'asc')->get();
        return view('livewire.admin.category.details', compact('products'));
    }
}
