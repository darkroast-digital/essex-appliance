<?php

namespace App\Http\Controllers\Theme;

use App\Ad;
use App\Color;
use App\Http\Controllers\Controller;
use App\Product;
use App\Variation;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $query = '?' . $_SERVER['QUERY_STRING'];

        $colors = Color::all();
        return view('theme.products', compact('colors', 'query'));
    }

    public function show(Request $request, $args)
    {
        $ads = Ad::where('name', '!=', 'banner')->limit(2)->get();

        if ($request->query('sku')) {
            $product = Variation::where('sku', $request->query('sku'))->with('product')->first();
            $original = $product->product;
            $variations = Variation::where('product_id', $original->id)->get();

            $images = $product->imagePaths();
            
            if (count($images) > 0) {
                $featured = $images[0];
                $secondary = [];

                for ($i = 1; $i < count($images); $i++) {
                    array_push($secondary, $images[$i]);
                }
            } else {
                $featured = null;
                $secondary = null;
            }

            if (!$variations) {
                $variations = null;
            }

            if (!$product) {
                return view('errors.404');
            }

            return view('theme.product-variation', compact('product', 'ads', 'variations', 'featured', 'secondary', 'original'));
        }

        $product = Product::where('name', $args)->first();
        $variations = Variation::where('product_id', $product->id)->get();

        $images = $product->imagePaths();
        
        if (count($images) > 0) {
            $featured = $images[0];
            $secondary = [];

            for ($i = 1; $i < count($images); $i++) {
                array_push($secondary, $images[$i]);
            }
        } else {
            $featured = null;
            $secondary = null;
        }

        if (!$variations) {
            $variations = null;
        }

        if (!$product) {
            return view('errors.404');
        }

        return view('theme.product', compact('product', 'ads', 'variations', 'featured', 'secondary'));
    }
}
