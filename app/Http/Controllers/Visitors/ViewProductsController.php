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
    public $categories;
    public $subCat;

    public function __construct()
    {
        //by default, categories and subCategories that have products which exist, and their status is active are shown in the list.
        //$subCat finds all the subCategories that checks for products with the conditions.
        $this->subCat = DB::table('product_categories')
            ->leftJoin('products', 'product_categories.id', '=', 'products.category_id')
            ->where('product_categories.level', 2)
            ->where('products.status', 1)
            ->distinct()
            ->pluck('product_categories.referencing');

        //$list_one is to get the catories that the $subCat is referencing to.
        $list_one = ProductCategory::where('level', 1)
            ->whereIn('id', $this->subCat)
            ->get();

        //$categories is a result of $list_one merging with all the categories that dont have subcategories but products(active)
        $this->categories = $list_one->merge(ProductCategory::where('level', 1)
            ->whereIn('id', Product::where('status', 1)->pluck('category_id'))
            ->get());

    }

    public function index()
    {
        $url = '';

        $categories = $this->categories;

        //I am using $listedEntry dynamically to fetch different sets of data unlike $categories, $subCategories
        //since they change on each request while $categories, $subCategories..etc are recurring in a few pages. 
        return view('Visitor.products.index', compact('url', 'categories'));
    }

    public function searchCategory1($category1)
    {
        //search for sub-categories list. If not found, look for products directly under this category. 
        $url = str_replace('-', ' ', $category1);

        $categories = $this->categories;

        $category_id = ProductCategory::where('name', $url)->value('id'); // dont touch

        $subCategories = $this->getSubcategories($category_id);

        if ($subCategories->count() < 1) {

            $listedEntry = Product::where('status', 1)->where('category_id', $category_id)->get();
            $subCategories = $listedEntry;

        } else {
            $listedEntry = $subCategories;
        }

        return view('Visitor.products.sub-categories', compact('url', 'listedEntry', 'subCategories', 'categories'));
    }

    public function searchCategory2($category1, $category2)
    {

        $categories = $this->categories;
        $category_id = ProductCategory::where('name', str_replace('-', ' ', $category1))
            ->value('id'); // dont touch

        $subCategories = $this->getSubcategories($category_id);

        $url = str_replace('-', ' ', $category1) . '/' . str_replace('-', ' ', $category2);

        if ($subCategories->count() < 1) {
            //since there are no subcategories under this Category, this function call will search for products using the same keywords.
            $product = $this->getProduct($data = [$category_id, $category2]);
            $subCategories = Product::where('status', 1)->where('category_id', $category_id)
                ->get();

            return view('Visitor.products.products-each', compact('url', 'subCategories', 'product', 'categories'));
        }

        //to get the list of products we find the matching category and the subcategory both.
        $listedEntry = Product::where('status', 1)
                ->where('category_id', ProductCategory::where('referencing', $category_id)
                ->where('name', str_replace('-', ' ', $category2))
                ->value('id'))
                ->get();
        $products = $listedEntry;

        return view('Visitor.products.products', compact('url', 'listedEntry', 'subCategories', 'categories', 'products'));
    }

    public function searchCategory3($category1, $category2, $category3)
    {
        $categories = $this->categories;
        $category_id = ProductCategory::where('name', str_replace('-', ' ', $category1))->value('id');
        $subCategoryId = ProductCategory::where('referencing', $category_id)
            ->where('name', str_replace('-', ' ', $category2))
            ->value('id');

        $subCategories = $this->getSubcategories($category_id);
        $products = Product::where('category_id', $subCategoryId)
            ->get('name', 'id');

        $url = str_replace('-', ' ', $category1) . str_replace('-', ' ', $category2) .  str_replace('-', ' ', $category3);

        //get product using the category Id and the product naame
        $product = $this->getProduct($data = [
            $subCategoryId,
            $category3
        ]);

        return view('Visitor.products.products-each', compact('product', 'subCategories', 'url', 'categories', 'products'));
    }

    public function getSubcategories($category_id)
    {
        return ProductCategory::leftJoin('products', 'product_categories.id', '=', 'products.category_id')
            ->where('product_categories.referencing', $category_id)
            ->where('products.status', 1)
            ->whereIn('products.category_id', ProductCategory::where('referencing', $category_id)->pluck('id'))
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
