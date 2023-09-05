<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Products extends Component
{
    public $search;
    public $password;
    public $productId;
    public $productName;
    public $productDescription;
    public $productQuantity;
    public $productModal = false;
    public $deleteModal = false;

    public function openProductModal()
    {
        $this->reset();
        $this->productModal = true;
        $this->productQuantity = 1;
    }

    public function deleteProductModal($id)
    {
        $this->reset();
        $this->productId = $id;
        $this->deleteModal = true;
    }

    public function confirmDeleteProduct()
    {
        $this->validate([
            'password' => 'required|current-password'
        ]);

        Product::destroy($this->productId);

        $this->deleteModal = false;
    }


    public function addProduct()
    {
        $product = Product::create([
            'name' => $this->productName,
            'description' => $this->productDescription,
            'quantity' => $this->productQuantity,
            'status' => 0
        ]);

        $product->details()->create();

        return redirect()->route('products.show', $product->id)->with('success', 'product created, Please edit the details before publishing');
    }

    public function render()
    {

        $products = Product::where('name', 'like', '%' . $this->search . '%')->get();
        return view('livewire.products', compact('products'));
    }
}