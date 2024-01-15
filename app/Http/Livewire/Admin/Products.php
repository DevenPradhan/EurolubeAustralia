<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\ProductCategory;
use Livewire\Component;

class Products extends Component
{
    public $search;
    public $validationSearch;
    public $password;
    public $productId;
    public $productName;
    public $productDescription;
    public $productQuantity;
    public $productModal = false;
    public $deleteModal = false;
    public $categoryDiv = false;
    public $productCategory;

    protected $listeners = ['categorySelected'];

   
    public function categorySelected($id)//from livewire component(edit-categories)
    {
       $this->productCategory = ProductCategory::find($id);
       $this->emit('select-category');

    }

       public function openProductModal()
    {
        $this->reset(
            'productId',
            'productName',
            'productDescription',
            'productCategory',
            'categoryDiv'
        );
        $this->productModal = true;
        $this->productQuantity = 1;

    }

    public function showCategoryDiv()
    {
        $this->categoryDiv = true;
    }

    public function deleteProductModal($id)
    {
        $this->reset('password');
        $this->resetValidation();
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
        $this->validate([
            'productName' => 'required',
            'productCategory' => 'required'
        ]);

        $product = Product::create([

            'name' => str_replace('/', 'p', $this->productName),
            'description' => $this->productDescription,
            'quantity' => $this->productQuantity,
            'category_id' => $this->productCategory->id,
            'status' => 0

        ]);

        $product->details()->create();

        return redirect()
            ->route('products.show', $product->id)
            ->with('success', 'product created, Please edit the details before publishing');
    }

    public function render()
    {
        if ($this->productName) {
            $this->validationSearch = Product::where('name', 'like', '%' . $this->productName . '%')
                ->first();
        }

        $statuses = collect(['Inactive', 'Active', 'Archived']);
        $products = Product::where('name', 'like', '%' . $this->search . '%')
            ->paginate(20);
        return view('livewire.admin.products', compact('products', 'statuses'));
    }
}