<?php

namespace App\Http\Livewire;

use App\Models\ProductCategory;
use App\Models\ProductType;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;
use DB;

class ProductTypes extends Component
{
    use WithPagination;

    public $search;
    public $nothingFound = false;
    public $categories;
    public $newTypes = [];

    public function mount()
    {
        $this->categories = ProductCategory::pluck('name', 'id');
        $this->newTypes = [
            ['name' => '', 'category' => '', 'description']
        ];
    }

    public function addType()
    {
        $this->newTypes[] = ['name' => '', 'category' => '', 'description' => ''];
    }

    public function removeType($id)
    {
        unset($this->newTypes[$id]);
        array_values($this->newTypes);
    }

    public function render()
    {
        $product_types = ProductType::where('name', 'like', '%' . $this->search . '%')
            ->paginate();

        if ($product_types->isEmpty()) {
            $product_categories = ProductCategory::where('name', 'like', '%'.$this->search.'%')->get();

            foreach ($product_categories as $product_category) {
                $product_types = collect(ProductType::where('product_category_id', $product_category->id)
                    ->get());
            }

            // $products = Product::where(function ($query) use ($searchTerm) {
            //     $query->whereRaw("str_contains(name, '$searchTerm')");
            // })->get();
            // $product_types = collect($type_array);
        }

        $this->nothingFound = $product_types->isNotEmpty();

        return view('livewire.product-types', ['product_types' => $product_types]);
    }
}