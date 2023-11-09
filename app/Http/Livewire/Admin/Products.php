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
    public $activeDiv = 'category_list';
    public $upperCategory;
    public $newCategory;
    public $newCategorySearch;
    public $productCategory;
    public $categories;

    // protected $listeners = ['reset-category' => 'mount'];

    public function saveCategory()
    {
        $this->validate([
            'newCategory' => 'required|'
        ]);

        $category = new ProductCategory;
        $category->name = str_replace('-', ' ', $this->newCategory);

        if (!empty($this->upperCategory)) {  
        
            $category->level = 2;
            $category->referencing = $this->upperCategory;

        } else {

            $category->level = 1;
        }

        $category->save();

        $this->categories = ProductCategory::where('level', 1)
            ->pluck('name', 'id');
        $this->reset('newCategory');
        $this->emit('saved');
    }

    public function selectCategory($id)
    {
        if (ProductCategory::where('referencing', $id)->count() === 0) {

            $this->productCategory = ProductCategory::find($id);
            $this->emit('select-category'); //after selecting category close select category div
            
            $this->categories = ProductCategory::where('level', 1)
                ->pluck('name', 'id');

        } else {
            $this->categories = ProductCategory::where('referencing', $id)
                ->pluck('name', 'id');
        }

    }

    public function mainCategory()
    {
        $this->reset('upperCategory');
        $this->categories = ProductCategory::where('level', 1)
            ->pluck('name', 'id');
    }

    public function openProductModal()
    {
        $this->reset(
            'productId',
            'productName',
            'productDescription',
            'productCategory',
            'categoryDiv',
            'activeDiv'
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

    public function mount()
    {

        $this->categories = ProductCategory::where('level', 1)
            ->pluck('name', 'id');
    }


    public function addProduct()
    {
        $this->validate([
            'productName' => 'required',
            'productCategory' => 'required'
        ]);

        $product = Product::create([

            'name' => $this->productName,
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
        if ($this->newCategory) {
            if ($this->upperCategory) {
                $this->newCategorySearch = ProductCategory::where('referencing', $this->upperCategory)
                    ->where('name', 'like', '%' . $this->newCategory . '%')
                    ->first();
            } else {

                $this->newCategorySearch = ProductCategory::where('level', 1)
                    ->where('name', 'like', '%' . $this->newCategory . '%')
                    ->first();

            }

        }
        if ($this->productName) {
            $this->validationSearch = Product::where('name', 'like', '%' . $this->productName . '%')
                ->first();
        }

        $statuses = collect(['Inactive', 'Active', 'Archived']);
        $products = Product::where('name', 'like', '%' . $this->search . '%')
            ->get();
        return view('livewire.admin.products', compact('products', 'statuses'));
    }
}