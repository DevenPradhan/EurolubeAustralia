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
        $url = str_replace('-', ' ', $url);

        $products = [];
        $categories = ProductCategory::where('level',1)->pluck('name', 'id');

        $category_id = ProductCategory::where('name', $url)->value('id');

        $listedEntry = ProductCategory::where('referencing', $category_id)->get();

    //    echo $listedEntry->count();
        if($listedEntry->count() === 0){
            $products = Product::where('category_id', $category_id)->get();
        }
        // $getCategories = ProductCategory::where('name',$url)->first();
        return view('Visitor.products', compact('categories', 'url', 'listedEntry', 'products'));
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
