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
        // $featured = Product::where('status', 1)->where('features')
        // $categories = ProductCategory::where('level', 1)->pluck('name', 'id');

        $listedEntry = ProductCategory::where('level', 1)->get();

        return view('Visitor.products.index', compact('url', 'listedEntry'));
    }

    public function searchCategory1($category1)
    {
        $url = str_replace('-', ' ', $category1);

        $category_id = ProductCategory::where('name', $url)->value('id'); // dont touch

    //the subCategories fetched are only those having products
        $subCategories = DB::table('product_categories')
            ->leftJoin('products', 'product_categories.id', '=', 'products.category_id')
            ->where('product_categories.referencing', $category_id)
            ->whereIn('products.category_id', ProductCategory::where('referencing', $category_id)->get('id'))
            ->select('product_categories.*')
            ->distinct()
            ->get();

            $listedEntry = $subCategories;

        if ($subCategories->count() === 0) {
            
            $listedEntry = Product::where('category_id', $category_id)->get();

            return view('Visitor.products.products', compact('url', 'listedEntry', 'subCategories'));
        }

        return view('Visitor.products.sub-categories', compact('url', 'listedEntry', 'subCategories'));
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

        // ProductCategory::findOrFail($category);

        // $products = Product::where('category_id', $category)
        //     ->get();

        return view('Visitor.products.products', compact('url', 'listedEntry', 'subCategories'));
    }

    public function searchCategory3($category1, $category2, $category3)
    {

        $category_id = ProductCategory::where('name', str_replace('-', ' ', $category1))->value('id');

        $subCategories = DB::table('product_categories')
            ->leftJoin('products', 'product_categories.id', '=', 'products.category_id')
            ->where('product_categories.referencing', $category_id)
            ->whereIn('products.category_id', ProductCategory::where('referencing', $category_id)->get('id'))
            ->select('product_categories.*')
            ->distinct()
            ->get();
        
        $product = Product::find(7);

        return view('Visitor.products.products-each', compact('product', 'subCategories'));
    }

    public function productsEach($name)
    {
        $products = Product::pluck('name', 'id');
         $prd = preg_match('/'.$name. '/', $products, $match);
        
         dd($prd);
        echo $product = Product::find($prd);

        return view('Visitor.products.products-each', compact('product'));
    }

}
