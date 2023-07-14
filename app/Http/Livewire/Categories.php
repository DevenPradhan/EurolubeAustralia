<?php

namespace App\Http\Livewire;

use App\Models\ProductCategory;
use Livewire\Component;
use Livewire\WithPagination;

class Categories extends Component
{

    use WithPagination;
    
    public $search;
    public $nothingFound = false;
    public $category_id;
    public $category;
    public $categoryDescription;
    public $newCategories = [];
    protected $rules = [
        'newCategories.*.name' => 'distinct:ignore_case'
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'category' => 'min:4|unique:product_categories,name,'.$this->category.'',
            'newCategories.*.name' => 'min:4|unique:product_categories,name|distinct'
        ],[
            'newCategories.*.name.unique' => 'There is already a data with that name in our records.',
            'newCategories.*.name.min' => 'Please insert at least 4 characters for ease of identification.'
        ]);
    }

   
    public function mount()
    {
        
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

    

    public function editModal($category)
    {
        // dd($category);
       $this->category_id = $category['id'];
        $this->category = $category['name'];
        $this->categoryDescription = $category['description'];

    }

    public function render()
    {
        $product_categories = ProductCategory::where('name', 'like', '%' . $this->search . '%')
                                ->paginate(8);

        $this->nothingFound = $product_categories->isNotEmpty();

        return view('livewire.categories', ['product_categories' => $product_categories]);
    }
}