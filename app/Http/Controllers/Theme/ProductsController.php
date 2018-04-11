<?php

namespace App\Http\Controllers\Theme;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        return view('theme.products');
    }

    public function show($args)
    {
        $product = Product::where('name', $args)->first();

        if (!$product) {
            return view('errors.404');
        }

        return view('theme.product', compact('product'));
    }
}
