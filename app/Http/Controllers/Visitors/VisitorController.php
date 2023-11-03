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

    public function products(ProductCategory $url = null)
    {
        $categories = ProductCategory::where('level', 1)->get();
        if ($url) {
            
            //get subcategories
            $get_list = ProductCategory::where('referencing', $url->id)->get();

            if($get_list->count() == 0){  //if no more categories find the products
                $get_list = Product::where('category_id', $url->id)->get();

                return view('Visitor.products', compact('categories', 'get_list'));
            }
            return view('Visitor.products', compact('categories', 'get_list'));
        }

        $categories = ProductCategory::where('level', 1)->get();
        // $products = Product::where('status', 1)->paginate(12);
        return view('Visitor.products', compact('categories'));
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
