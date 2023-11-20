<?php

namespace App\Http\Livewire\Guest;

use Livewire\Component;
use App\Models\ProductFeature;
use App\Models\Product;


class FeaturedProducts extends Component
{
    public $count = 1;
    public $featuredProducts;
    public $products;
    public $product;

    public function previousItem()
    {
        if ($this->count > 1) {
            $this->count--;
        $this->mount();

        }
    }

    public function nextItem()
    {

        if ($this->count < $this->products->count()) {
            $this->count++;

        }else{
            $this->reset('count');
        }
        $this->mount();

    }

    public function mount()
    {
        $this->featuredProducts = ProductFeature::where('additional', 1)
            ->latest()
            ->take(6)
            ->get('product_id');

        $this->products = Product::whereIn('id', $this->featuredProducts)
            ->where('status', 1)
            ->get();
            

        $this->product = Product::whereIn('id', $this->featuredProducts)
            ->where('status', 1)
            ->orderBy('created_at')
            ->skip($this->count - 1)
            ->first();
        
    }
    public function render()
    {

        return view('livewire.guest.featured-products');
    }
}