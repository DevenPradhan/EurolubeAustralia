<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\ProductCategory;
use Livewire\Component;

class AddCategories extends Component
{
    public $addModal = false;
    public $categoryName;
    public $upCategory = '0';

    public function openAddModal()
    {
        $this->reset();
        $this->addModal = true;
    }

    public function saveNewCategory()
    {
        
        $this->validate([
            'categoryName' => 'unique:product_categories,name'
        ]);


        if ($this->upCategory == 0) {

            ProductCategory::create([
                'name' => $this->categoryName,
                'level' => '1',
            ]);
            $this->emitUp('render');

        } else {

            ProductCategory::create([
                'name' => $this->categoryName,
                'level' => '2',
                'referencing' => $this->upCategory
            ]);
            $this->emitUp('updateSubSategories', $this->upCategory);
        }

        $this->addModal = false;

    }

    public function render()
    {
        $upCategories = ProductCategory::where('level', 1)
                            ->whereNotIn('id', Product::get('category_id')->unique('category_id'))
                            ->pluck('name', 'id');
                            
        return view('livewire.admin.add-categories', compact('upCategories'));
    }
}
