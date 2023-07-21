<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
    public function uploadCategory(Request $request, $id)
    {

        $request->validateWithBag('imageUpload', [
            'images.*' => 'image|mimes:jpg,png|max:800'
        ]);
        // ,[
        //         'images.*.mimes' => 'Only files of JPG and PNG are accepted',
        //         'images.*.max' => 'The images must not exceed a file size of 0.8 MB'
        //     ]);

        if ($request->hasFile('images')) {

            $images = $request->file('images');
            $primary = ProductCategory::find($id);

            foreach ($images as $image) {

                $image_url = time() . $image->getClientOriginalName();
                $primary->images()->create(['url' => $image_url]);

                Storage::putFileAs('images', $image, $image_url);
            }
        }


        return back()->with('success', 'image uploaded successfully');

    }

    public function uploadType(Request $request, $id)
    {

        if ($request->hasFile('images')) {

            $images = $request->file('images');

            foreach ($images as $image) {

                $image_url = time() . $image->getClientOriginalName();
                $primary = ProductType::find($id);
                $primary->images()->create(['url' => $image_url]);

                Storage::putFileAs('images', $image, $image_url);
            }
        }


        return back()->with('success', 'image uploaded successfully');
    }

    public function uploadProduct(Request $request, $id)
    {
        // dd($request->all());
        $request->validateWithBag(
            'imageUpload',
            [
                'images.*' => 'image|mimes:jpg,png|max:1024'
            ]
        );


        if ($request->hasFile('images')) {

            $images = $request->file('images');

            foreach ($images as $image) {

                $image_url = time() . $image->getClientOriginalName();
                $primary = Product::find($id);
                $primary->images()->create(['image_url' => $image_url]);

                Storage::putFileAs('images', $image, $image_url);
            }
        }

        return back()->with('success', 'images uploaded');

    }
}