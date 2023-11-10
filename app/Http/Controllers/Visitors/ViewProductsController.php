<?php

namespace App\Http\Controllers\Visitors;

use App\Http\Controllers\Controller;
use App\Models\Product;
use DB;
use Illuminate\support\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ViewProductsController extends Controller
{
    public function index()
    {
        $url = '';
        // $categories = ProductCategory::where('level', 1)->pluck('name', 'id');
        $listedEntry = ProductCategory::where('level', 1)->get();

        return view('Visitor.products', compact('url', 'listedEntry'));
    }

    public function searchCategory1($category1)
    {
        $url = str_replace('-', ' ', $category1);

        $category_id = ProductCategory::where('name', $url)->value('id'); // dont touch

        // $subCategories = ProductCategory::where('referencing', $category_id)->get();

        $subCategories = DB::table('product_categories')
            ->leftJoin('products', 'product_categories.id', '=', 'products.category_id')
            ->where('product_categories.referencing', $category_id)
            ->whereIn('products.category_id', ProductCategory::where('referencing', $category_id)->get('id'))
            ->select('product_categories.*')
            ->distinct()
            ->get();

        // echo $test = ProductCategory::where('referencing', $url)->distinct()->get();

        // echo $sub = Product::whereIn('category_id', $subCategories->id)->get();

        $listedEntry = $subCategories;

        if ($subCategories->count() === 0) {
            $listedEntry = Product::where('category_id', $category_id)->get();
        }

        return view('Visitor.products', compact('url', 'listedEntry', 'subCategories'));
    }

    public function searchCategory2($category1, $category2)
    {

        $url = str_replace('-', ' ', $category1) . '/' . str_replace('-', ' ', $category2);

        $category_id = ProductCategory::where('name', str_replace('-', ' ', $category1))->value('id'); // dont touch

        $subCategories = DB::table('product_categories')
            ->leftJoin('products', 'product_categories.id', '=', 'products.category_id')
            ->where('product_categories.referencing', $category_id)
            ->whereIn('products.category_id', ProductCategory::where('referencing', $category_id)->get('id'))
            ->select('product_categories.*')
            ->distinct()
            ->get();

        $category = ProductCategory::where('referencing', $category_id)
            ->where('name', str_replace('-', ' ', $category2))
            ->value('id');

            $listedEntry = Product::where('category_id', $category)->get();

        ProductCategory::findOrFail($category);

        // $products = Product::where('category_id', $category)
        //     ->get();

        return view('Visitor.products', compact('url', 'listedEntry', 'subCategories'));
    }

    public function searchCategory3($category1, $category2, $category3)
    {
        dd($category3);

        // return view('Visitor.products', compact('url', 'listedEntry', 'subCategories'));
    }

    public function productsEach($name)
    {
        dd($name);
        $product = Product::where('name', str_replace('-', ' ', $name))->first();
        return view('Visitor.products-each', compact('product'));
    }

    public function test($url)
    {
        dd($url);
    }
}
