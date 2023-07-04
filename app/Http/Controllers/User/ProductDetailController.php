<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;

class ProductDetailController extends Controller
{

    public function index($id)
    {

        $product = Product::findOrFail($id);

        return view('User.product-details', compact('product'));
    }
    public function updateDetails(Request $request, $id)
    {
        $product = Product::find($id);

        $request->validateWithBag(
            'detailsModal',
            [
                'name' => 'required|unique:products,name,' . $id . '',
                'part_no' => 'unique:product_details,part_no,' . $product->details->id . '',
                'description' => 'max:255',
                'dimensions' => 'max:40',
                'weight' => 'max:40',
                'manual' => 'file|max:1024'
            ],
            [
                'manual.max' => 'A max of 1MB of file size is supported'
            ]
        );

      
        

        $product->save();

        $product->details()->update([

            'part_no' => $request->part_no,
            'dimensions' => $request->dimensions,
            'weight' => $request->weight,
        
        ]);

        if ($request->hasFile('manual')) {

            $file = $request->file('manual');
            $file_url = time() . $file->getClientOriginalName();

        Storage::delete('/manuals/' . $product->details->manual);

        Storage::putFileAs('manuals', $file, $file_url);
        
        $product->details()->update([
            'manual' => $file_url ]);

    }

        $product->update([

            'name' => $request->name,
            'description' => $request->description

        ]);

        return back()->with('success', 'Product Details Updated successfully');
    }
}