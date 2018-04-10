<?php

namespace App\Http\Controllers\Theme;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('theme.home');
    }

    public function products()
    {
        return view('theme.products');
    }

    public function show($args)
    {
        $product = Product::where('name', $args)->first();
        return view('theme.product', compact('product'));
    }
}
