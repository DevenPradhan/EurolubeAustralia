<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()->with(['type' => ['category:id,name']
        ])->get();

        $types = ProductType::pluck('name', 'id');
        // $categories = ProductCategory::pluck('name', 'id');
        return view('User.products', compact('products', 'types'));
    }

    public function add_product(Request $request)
    {

        // dd($request->all());
        $validated = $request->validateWithBag('productAddition', [
            'name' => 'required|unique:products|max:40',
            'product_type' => 'required',
            // 'category' => 'required',
            'quantity' => 'required'
        ], [
            'name.unique' => 'The item has already been added'
        ]);
        

        $product = new Product;
        $product->name = $request->name;
        $product->product_type_id = $request->product_type;
        $product->validity = 0;
        $product->quantity = $request->quantity;
        $product->save();

        return back()->with('success', '"' . $request->name . '" has been added successfully');
    }

    public function details($id)
    {
        $product = Product::findOrFail($id);

        return view('User.product_details', compact('product'));
    }
}