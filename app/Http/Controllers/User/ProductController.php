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
        return view('User.products');
    }

    public function add_product(Request $request)
    {

        // $validated = $request->validateWithBag('productAddition', [
        //     'name' => 'required|unique:products|max:40',
        //     'product_type' => 'required'
        //     // 'quantity' => 'required'
        // ], [
        //     'name.unique' => 'The item has already been added',
        // ]);

        foreach ($request->newProducts as $newProduct) {
            $product = Product::create([
                'name' => $newProduct['name'],
                'product_type_id' => $newProduct['product_type'],
                'validity' => 0,
                'quantity' => $newProduct['quantity']
            ]);

            $product->details()->create([
                'part_no' => '',
                'weight' => '',
                'manual' => '',
                'dimensions' => ''
            ]);
        }

        return back()->with('success', 'Products has been added successfully');
    }

    public function destroy($id)
    {
        Product::where('id', $id)->delete();

        return back()->with('warning', 'Product has been deleted.');
    }


    public function putDescription(Request $request, $id)
    {
        $request->validateWithBag('descriptionModal', [
            'description' => 'max:999'
        ]);

        Product::where('id', $id)->update(['description' => $request->description]);

        return back()->with('success', 'description added/edited successfully');
    }

}