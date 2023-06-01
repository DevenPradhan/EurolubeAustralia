<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {

        $categories = ProductCategory::all();
        return view('User.category', compact('categories'));
    }

    public function add_category(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|max:20'
        ]);

        $category = new ProductCategory;
        $category->name = $request->name;
        $category->validity = 0;
        $category->save();

        return back()->with('success', '"' . $request->name . '" added successfully.');
    }

    public function destroy_category($id)
    {
        ProductCategory::where('id', $id)->delete();

        return back()->with('warning', '"' . $id . '" has been deleted.');
    }
}