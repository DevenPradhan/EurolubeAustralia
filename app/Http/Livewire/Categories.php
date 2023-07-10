<?php

namespace App\Http\Livewire;

use App\Models\ProductCategory;
use Livewire\Component;

class Categories extends Component
{

    public $search;
    public $category;
    public $categoryDescription;
    public $newCategories = [];
    // protected $rules = [
    //     'newCategories.*.name' => 'distinct:ignore_case'
    // ];

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'newCategories.*.name' => 'min:4|unique:product_categories,name'
        ]);
    }

   
    public function mount()
    {
        // $this->category;
        // $this->categoryDescription;
        
        $this->newCategories = [
            ['name' => '', 'description' => '']
        ];
    }

    public function addCategory()
    {
        $this->newCategories[] = ['name' => '', 'description' => ''];
    }

    public function cancelModal()
    {
        $this->reset();
        $this->newCategories = [

            ['name' => '', 'description' => '']
        ];
    }

    public function removeCategory($id)
    {
        unset($this->newCategories[$id]);
        array_values($this->newCategories);
    }

    public function render()
    {
        $product_categories = ProductCategory::where('name', 'like', '%' . $this->search . '%')->paginate(10);
        return view('livewire.categories', ['product_categories' => $product_categories]);
    }

    public function editModal($id)
    {
        $category = ProductCategory::find($id);
    }
}