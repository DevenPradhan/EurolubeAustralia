<?php

namespace App\Http\Controllers\Visitors;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
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
}
