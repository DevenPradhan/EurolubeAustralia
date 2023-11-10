<?php

namespace App\Http\Controllers\Visitors;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $url = 'Products';
        $listedEntry = ProductCategory::where('level', 1)->get();
        return view('Visitor.products-test', compact('url','listedEntry'));
    }

    public function category($category){

        echo $url = str_replace('-', ' ', $category);

        
        $subCategories = ProductCategory::where('referencing', ProductCategory::where('name', $url)->value('id'))->get();
        $listedEntry = $subCategories;

        return view('Visitor.products-test', compact('url', 'listedEntry', 'subCategories'));
    }

    public function subProduct($category, $subProduct)
    {
        dd($category, $subProduct);
    }

    public function product($category, $subProduct, $product)
    {
        dd($category, $subProduct, $product);   
    }
}
