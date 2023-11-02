<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Rules\CategoryExistsRule;
use Livewire\Component;

class ProductCategories extends Component
{
    public $categories;
    public $categoryId;
    public $subCategories;
    public $deleteId;
    public $password;
    public $editModal = false;
    public $categoryForEdit; //Category to edit 
    public $categoryName; //wired model for edit category
    public $upCategory; //wired model for main category of sub category to edit
    public $deleteModal = false;

    public function getSubCategories($id)
    {
        //selected category on reselect, hides/resets the categoryId plus its sub-categories
        if ($this->categoryId == $id) {
            $this->reset('categoryId', 'subCategories');
        //if a new category is selected, the categoryId is assigned the $id value
        } else {
            $this->categoryId = $id;
        }
        //after selecting a new category, then get the list of its subcategories.
        $this->subCategories = ProductCategory::where('referencing', $id)->get();
            
        //if there are no more sub-categories then reroute to products page

        if ($this->subCategories->count() === 0) {
            return to_route('category-products', $id);
        }

        
    }

    public function openEditModal($id)
    {
        $this->resetValidation();
        $this->reset('categoryName');
        $this->categoryForEdit = ProductCategory::find($id);    // category to edit
        $this->categoryName = $this->categoryForEdit->name;     //category to edit name -> wired model
        
        if($this->categoryForEdit->level > 1)
        { 
            //category to edit referencing other category -> wired model
            $this->upCategory = ProductCategory::where('id', $this->categoryForEdit->referencing)->value('id'); 
        }
        $this->editModal = true;
        // $this->reset()
    }
    public function saveEditModal()
    {
        
        // $this->validate([
        //     'categoryName' => 'required|unique:product_categories,name,' . $this->categoryForEdit->id . ''
        // ]);
            $this->categoryForEdit->name = $this->categoryName;

            if($this->upCategory) //if parent category is changed
            {
                //validation rule to see if the parent category has a category of the same name
                $this->validate([
                    'upCategory' => ['required', new CategoryExistsRule($this->categoryForEdit, $this->upCategory)],
                ]);

                $this->categoryForEdit->referencing = $this->upCategory;
            }
            $this->categoryForEdit->save();
            $this->editModal = false;

            //when the changes are made refresh the sub-categories
            $this->subCategories = ProductCategory::where('referencing', $this->categoryId)->get();
            if($this->subCategories->count() === 0) // if sub-categories count = 0, reset the page
            {
                $this->reset('categories', 'categoryId');
            }
        }
    public function openDeleteModal($id)
    {
        $this->reset('password');
        $this->resetValidation();
        $this->deleteId = $id;
        $this->deleteModal = true;
    }

    public function confirmDeleteCategory()
    {
        $this->validate([
            'password' => 'required|current-password'
        ]);

        ProductCategory::destroy($this->deleteId);
        ProductCategory::where('referencing', $this->deleteId)
                        ->delete();

        $this->deleteModal = false;

        //get the list of all the subcategories to refresh the current list
        $this->subCategories = ProductCategory::where('referencing', $this->categoryId)
                                                ->get();
        
        //if the list is empty refresh the primary category list itself                                                
        if($this->subCategories->isEmpty()){
            $this->reset();
        }

    }

    public function render()
    {

        $this->categories = ProductCategory::where('level', 1)->get();

        // if ($this->categoryId) {
        //     $categories->where('referencing', $this->categoryId);
        // } else {
        //     $categories->where('level', 1);
        // }
        // $categories = $categories->get();

        return view('livewire.admin.product-categories');
    }
}