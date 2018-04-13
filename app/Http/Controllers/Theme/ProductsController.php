<?php

namespace App\Http\Controllers\Theme;

use App\Ad;
use App\Color;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $colors = Color::all();
        return view('theme.products', compact('colors'));
    }

    public function show($args)
    {
        $product = Product::where('name', $args)->first();
        $ads = Ad::where('name', '!=', 'banner')->limit(2)->get();

        if (!$product) {
            return view('errors.404');
        }

        return view('theme.product', compact('product', 'ads'));
    }
}
