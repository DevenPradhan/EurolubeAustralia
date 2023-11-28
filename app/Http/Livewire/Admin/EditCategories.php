<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProductCategory;
use Livewire\Component;

class EditCategories extends Component
{
    public $categories;
    public $upperCategory;
    public $newCategory;
    public $newCategorySearch;
    public $activeDiv = 'category_list';
    protected $listeners = ['select-category' => 'mount'];

    public function selectCategory($id)
    {
        if (ProductCategory::where('referencing', $id)->count() === 0) {

            $this->productCategory = ProductCategory::find($id);
            $this->emit('categorySelected', $id); //after selecting category close select category div

            // $this->categories = ProductCategory::where('level', 1)
            //     ->pluck('name', 'id');

        } else {
            $this->categories = ProductCategory::where('referencing', $id)
                ->pluck('name', 'id');
        }

    }

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


    public function mainCategory()
    {
        $this->reset('upperCategory');
        $this->categories = ProductCategory::where('level', 1)
            ->pluck('name', 'id');
    }

    public function mount()
    {
        $this->reset('activeDiv');
        $this->categories = ProductCategory::where('level', 1)
            ->pluck('name', 'id');
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
        return view('livewire.admin.edit-categories');
    }
}
