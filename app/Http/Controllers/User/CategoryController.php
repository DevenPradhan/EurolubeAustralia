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

        //if validation fails, it takes you back to the modal
        $validated = $request->validateWithBag('categoryAddition', [
            'category' => 'required|max:20|unique:product_categories,name,',
            'description' => 'max:255'
        ]);

        $category = new ProductCategory;
        $category->name = $request->category;
        $category->description = $request->description;
        $category->validity = 0;
        $category->save();

        return back()->with('success', '"' . $request->category . '" added successfully.');
    }

    public function edit(Request $request)
    {
        $request->validateWithBag('editModal', [
            'category' => 'required|unique:product_categories,name'
        ]);

            ProductCategory::where('id', $request->category_id)
                            ->update(['name' => $request->category]);

        return back()->with('success', 'The category has been updated successfully');
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
        $category = ProductCategory::find($id);

        return view('User.category_details', compact('category', 'types', 'categories'));
    }

    public function putDescription(Request $request, $id)
    {

        $request->validateWithBag('descriptionModal', [
                                  'description' => 'required|max:999'
        ]);

        ProductCategory::where('id', $id)->update(['description' => $request->description]);

        return back()->with('success', 'description added/edited successfully');
    }

}