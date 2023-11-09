<?php

namespace App\Http\Controllers\Visitors;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ViewProductsController extends Controller
{
    public function index()
    {
        $url = '';
        // $categories = ProductCategory::where('level', 1)->pluck('name', 'id');
        $listedEntry = ProductCategory::where('level', 1)->get();

        return view('Visitor.products', compact('url', 'listedEntry'));
    }

    public function searchCategory1($category1)
    {
        $url = str_replace('-', ' ', $category1);

        $products = [];

        $category_id = ProductCategory::where('name', $url)->value('id'); // dont touch

        // ProductCategory::findOrFail($category_id);

        $subCategories = ProductCategory::where('referencing', $category_id)->get();
        $listedEntry = ProductCategory::where('referencing', $category_id)->get();

        if ($subCategories->count() === 0) {
            $products = Product::where('category_id', $category_id)->get();
        }

        return view('Visitor.products', compact('url', 'listedEntry', 'subCategories', 'products'));
    }

    public function searchCategory2($category1, $category2)
    {
        
        $url = str_replace('-', ' ', $category1) . '/' . str_replace('-', ' ', $category2);
        $products = [];
        
        $category_id = ProductCategory::where('name', str_replace('-', ' ', $category1))->value('id'); // dont touch

        $subCategories = ProductCategory::where('referencing', $category_id)->get();
        
        $category = ProductCategory::where('referencing', $category_id)
                                    ->where('name', str_replace('-', ' ', $category2))
                                  ->value('id');
        
        ProductCategory::findOrFail($category);
        
        $products = Product::where('category_id', $category)
                            ->get();
        
        return view('Visitor.products', compact('url', 'products', 'subCategories'));
    }

    public function productsEach($name)
    {
        dd($name);
        $product = Product::where('name', str_replace('-', ' ', $name))->first();
        return view('Visitor.products-each', compact('product'));
    }
}
