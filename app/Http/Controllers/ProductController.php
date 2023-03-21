<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() 
    {
        $products = Product::paginate(10);
        return view('shop.index')->with([
            'products' => $products
        ]);
    }

    public function show(Product $product) 
    {
        return view('shop.show')->with([
            'product' => $product
        ]);
    }
}
