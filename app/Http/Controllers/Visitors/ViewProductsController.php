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

        $listedEntry = ProductCategory::where('level', 1)->get();

        return view('Visitor.products.index', compact('url', 'listedEntry'));
    }

    public function searchCategory1($category1)
    {
        $url = str_replace('-', ' ', $category1);

        $category_id = ProductCategory::where('name', $url)->value('id'); // dont touch

        $subCategories = $this->getSubcategories($category_id);

        $listedEntry = $subCategories;

        if ($subCategories->count() === 0) {

            $listedEntry = Product::where('category_id', $category_id)->get();
        }

        return view('Visitor.products.sub-categories', compact('url', 'listedEntry', 'subCategories'));
    }

    public function searchCategory2($category1, $category2)
    {

        $url = str_replace('-', ' ', $category1) . '/' . str_replace('-', ' ', $category2);

        $category_id = ProductCategory::where('name', str_replace('-', ' ', $category1))->value('id'); // dont touch

        $subCategories = $this->getSubcategories($category_id);

        if ($subCategories->count() === 0) {
            $product = $this->getProduct($data = [$category_id, $category2]);

            return view('Visitor.products.products-each', compact('url', 'subCategories', 'product'));
        }

        $category = ProductCategory::where('referencing', $category_id)
            ->where('name', str_replace('-', ' ', $category2))
            ->value('id');

        $listedEntry = Product::where('category_id', $category)->get();

        return view('Visitor.products.products', compact('url', 'listedEntry', 'subCategories'));
    }

    public function searchCategory3($category1, $category2, $category3)
    {
        $url = str_replace('-', ' ', $category1) . str_replace('-', ' ', $category2) . str_replace('-', ' ', $category3);

        $category_id = ProductCategory::where('name', str_replace('-', ' ', $category1))->value('id');

        $subCategories = $this->getSubcategories($category_id);

        //get product using the category Id and the product naame
        $product = $this->getProduct($data = [ProductCategory::where('referencing', $category_id)
                            ->where('name', str_replace('-', ' ', $category2))
                            ->value('id'), $category3]);

        return view('Visitor.products.products-each', compact('product', 'subCategories', 'url'));
    }

    public function getSubcategories($category_id)
    {
        
        return DB::table('product_categories')
            ->leftJoin('products', 'product_categories.id', '=', 'products.category_id')
            ->where('product_categories.referencing', $category_id)
            ->where('products.status', 1)
            ->whereIn('products.category_id', ProductCategory::where('referencing', $category_id)->get('id'))
            ->select('product_categories.*')
            ->distinct()
            ->get();
    }

    public function getProduct($data)
    {
        $prd_search = '/' . str_replace('-', ' ', $data[1]) . '/i';
        $products = Product::where('status', 1)->where('category_id', $data[0])->get();

        foreach ($products as $product) {
            $prd = preg_match($prd_search, str_replace('-', ' ', $product->name));
            if ($prd) {
                return $product;
            }
        }
        return abort(404);
    }

}
