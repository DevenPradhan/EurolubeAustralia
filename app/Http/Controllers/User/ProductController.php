<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::pluck('name', 'id');
        $products = Product::all();
        return view('User.products', compact('products', 'categories'));
    }

    public function add_product(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:40',
            'category' => 'required|integer'
        ]);


        $product = new Product;
        $product->name = $request->name;
        $product->product_category_id = $request->category;
        $product->validity = 0;
        $product->save();

        return back()->with('success', '"' . $request->name . '" has been added successfully');
    }

    public function details($id)
    {
        $product = Product::findOrFail($id);

        return view('User.product_details', compact('product'));
    }
}