<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\ProductType;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $product_types = ProductType::query()->with('category:id,name')->get();
        $categories = ProductCategory::pluck('name', 'id');

        return view('User.type', compact('product_types', 'categories'));
    }

    public function add_type(Request $request)
    {
        $request->validateWithBag('typeAddition', [
            'type' => 'required|unique:product_types,name'        ]);

            // dd($request->all());

            ProductType::create([
                'name' => $request->type,
                'product_category_id' => $request->category,
                'description' => $request->description
            ]);

        return back()->with('success', '"' . $request->type . '" added successfully."');
    }

    public function edit(Request $request)
    {
        $request->validateWithBag('editModal', [
            'type' => 'required|unique:product_types,name',
        ]);

        ProductType::where('id', $request->type_id)->update(['name' => $request->type, 'product_category_id' => $request->category]);

        return back()->with('success', 'Product Type edited successfully!');
    }

    public function detail($id)
    {
        $types = ProductType::pluck('name', 'id');
        $type = ProductType::find($id);

        return view('User.type_details', compact('type', 'types'));
    }

    public function putDescription(Request $request, $id)
    {

        $request->validateWithBag('descriptionModal', [
            'description' => 'required|max:999'
        ]);

        ProductType::where('id', $id)->update(['description' => $request->description]);

        return back()->with('success', 'description added/edited successfully');
    }



}