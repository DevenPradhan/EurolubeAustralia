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
            'type' => 'required',
        ]);

        ProductType::create([
            'name' => $request->type,
            'product_category_id' => $request->category
        ]);

        return back()->with('success', '"' . $request->type . '" added successfully."');
    }

    public function detail($id)
    {
        $types = ProductType::all();
        $type = ProductType::find($id);

        return view('User.type_details', compact('type', 'types'));
    }

}