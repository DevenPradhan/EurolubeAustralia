<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\ProductType;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $product_categories = ProductCategory::all();

        return view('User.category', compact('product_categories'));
    }

    public function add_category(Request $request)
    {

        $validated = $request->validateWithBag('categoryAddition', [
            //if validation fails, it takes you back to the modal
            'category' => 'required|max:20'
        ]);

        $category = new ProductCategory;
        $category->name = $request->category;
        $category->validity = 0;
        $category->save();

        return back()->with('success', '"' . $request->category . '" added successfully.');
    }

    public function destroy_category($id)
    {
        $category = ProductCategory::where('id', $id)->value('name');
        ProductCategory::where('id', $id)->delete();

        return back()->with('warning', '"' . $category . '" has been deleted.');
    }

    public function detail($id)
    {
        $types = ProductType::pluck('name', 'id');
        $categories = ProductCategory::pluck('name', 'id');
        $primary = ProductCategory::find($id);

        return view('User.category_details', compact('primary', 'types', 'categories'));
    }

}