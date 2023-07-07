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

        return view('User.category');
    }

    public function add_category(Request $request)
    {
        $request->validateWithBag('categoryAddition', [
           'newCategories.*.name' => 'min:4' 
        ]);
        // dd($request->all());
        foreach($request->newCategories as $newCategory)
        {
            ProductCategory::create([
                'name' => $newCategory['name'], 
                'description' => $newCategory['description'], 
                'validity' => 0]);
        }

        return back()->with('success', 'Category added successfully.');
    }

    public function edit(Request $request)
    {
        $old_category = ProductCategory::find($request->category_id);

        $request->validateWithBag('editModal', [
            'category' => 'required|unique:product_categories,name,'.$old_category->id.'',
            'description' => 'max:999'
        ]);

            ProductCategory::where('id', $request->category_id)
            ->update([
                'name' => $request->category, 
                'description' => $request->description
                                                        ]);

        return back()->with('success', 'The category has been updated successfully');
    }

    public function destroy_category($id)
    {
        $category = ProductCategory::where('id', $id)
                                    ->value('name');
        ProductCategory::where('id', $id)
                        ->delete();

        return back()->with('warning', '"' . $category . '" has been deleted.');
    }

    public function detail($id)
    {
        $types = ProductType::pluck('name', 'id');
        $categories = ProductCategory::pluck('name', 'id');
        $category = ProductCategory::findOrFail($id);

        return view('User.category_details', compact('category', 'types', 'categories'));
    }

    public function putDescription(Request $request, $id)
    {

        // dd($request->all());
        $request->validateWithBag('descriptionModal', [
            'description' => 'max:999'
        ]);

        ProductCategory::where('id', $id)->update(['description' => $request->description]);

        return back()->with('success', 'description added/edited successfully');
    }

}