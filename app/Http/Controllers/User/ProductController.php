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
        $types = ProductType::pluck('name', 'id');
        $categories = ProductCategory::pluck('name', 'id');
        echo $products = Product::with('category')->get();
        return view('User.products', compact('products', 'categories', 'types'));
    }

    public function add_product(Request $request)
    {

        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|max:40',
            'product_type' => 'required',
            // 'category' => 'required',
            'quantity' => 'required'
        ]);
        
        
        $product = new Product;
        $product->name = $request->name;
        $product->product_type_id = $request->product_type;
        $product->validity = 0;
        $product->quantity = $request->quantity;
        $product->save();


        // if(ProductCategory::where('id', $request->product_category)->doesntExist()){

        // }

       

        return back()->with('success', '"' . $request->name . '" has been added successfully');
    }

    public function details($id)
    {
        $product = Product::findOrFail($id);

        return view('User.product_details', compact('product'));
    }
}