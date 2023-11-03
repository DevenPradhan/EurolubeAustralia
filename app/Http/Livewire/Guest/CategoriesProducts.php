<?php

namespace App\Http\Livewire\Guest;

use App\Models\Product;
use App\Models\ProductCategory;
use Livewire\Component;

class CategoriesProducts extends Component
{
    public $get_list;

    public function render()
    {

        return view('livewire.guest.categories-products');
    }
}
