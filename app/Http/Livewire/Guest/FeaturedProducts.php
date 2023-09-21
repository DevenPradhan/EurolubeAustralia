<?php

namespace App\Http\Livewire\Guest;

use Livewire\Component;
use App\Models\ProductFeature;
use App\Models\Product;


class FeaturedProducts extends Component
{
    public function render()
    {
        $featuredProducts = ProductFeature::where('additional', 1)
            ->get('product_id');

        $products = Product::whereIn('id', $featuredProducts)
            ->where('status', 1)
            ->latest()
            ->take(3)
            ->get();

        return view('livewire.guest.featured-products', compact('products'));
    }
}