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
        $products = Product::where('status', 1)->paginate(12);
        return view('Visitor.products', compact('products'));
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

    public function productsAll()
    {
        return view('Visitor.products-all');
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
