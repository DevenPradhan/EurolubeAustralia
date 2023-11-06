<?php

namespace App\Http\Controllers\Visitors;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductFeature;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index()
    {
        $featuredProducts = ProductFeature::where('additional', 1)
            ->get('product_id');

        $products = Product::whereIn('id', $featuredProducts)
            ->where('status', 1)
            ->latest()
            ->take(3)
            ->get();

        return view('Visitor.home', compact('products'));
    }

    public function products()
    {
        $categories = ProductCategory::where('level', 1)->pluck('name', 'id');
        $listedEntry = $categories;

        return view('Visitor.products', compact('categories', 'listedEntry'));
    }

    public function aboutUs()
    {
        return view('Visitor.about-us');
    }

    public function newsBlog()
    {
        return view('Visitor.news-blogs');
    }

    public function allNews()
    {
        return view('Visitor.all-news');
    }

    public function productsAll($url)
    {
        $categories = ProductCategory::where('level',1)->pluck('name', 'id');

        echo $getCategory = ProductCategory::where('name', $url)->value('id');

       echo $listedEntry = ProductCategory::where('referencing', $getCategory)->get();

        if($listedEntry->count() == 0){
            echo $listedEntry = Product::where('category_id', $getCategory)->get();
        }
        // $getCategories = ProductCategory::where('name',$url)->first();
        return view('Visitor.products', compact('categories', 'url', 'listedEntry'));
    }

    public function productsEach($id)
    {
        $product = Product::findOrFail($id);
        return view('Visitor.products-each', compact('product'));
    }

    public function contactUs()
    {
        return view('Visitor.contact-us');
    }

    public function services()
    {

        return view('Visitor.services');
    }

    public function downloads()
    {

        return view('Visitor.downloads');
    }
}
