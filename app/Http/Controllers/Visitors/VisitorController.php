<?php

namespace App\Http\Controllers\Visitors;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index()
    {
        return view('Visitor.home');
    }

    public function products()
    {
        $products = Product::all();
        return view('Visitor.products');
    }
}
