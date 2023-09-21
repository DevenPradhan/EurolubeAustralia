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

        return view('Visitor.home');
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
}
