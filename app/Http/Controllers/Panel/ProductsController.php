<?php

namespace App\Http\Controllers\Panel;

use App\Color;
use App\Product;
use Illuminate\Http\Request;
use Parttimenobody\Tags\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(10);

        return view('panel.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Tag::all()->where('tag_type', 'category');
        $brands = Tag::all()->where('tag_type', 'brand');
        $hash = Hash::make(str_random(60));

        return view('panel.products.create', compact('categories', 'brands', 'hash'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $colors = explode(',', $request->colors);
        $product = Product::create([
            'hash' => $request->_hash,
            'name' => $request->name,
            'sku' => $request->sku,
            'upc' => $request->upc,
            'description' => $request->description,
            'features' => $request->features,
            'available' => $request->available === 'on' ? 1 : 0,
            'featured' => $request->featured === 'on' ? 1 : 0
        ]);

        foreach ($colors as $color) {
            $product->tag($color);
        }

        $product->tag($request->category);
        $product->tag($request->brand);

        $request->session()->flash('alert:sucess', 'Product was created!');

        return redirect()->route('panel.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $productColors = $product->tags()->where('tag_type', 'color')->get();
        $colors = [];

        foreach ($productColors as $c) {
            $color = flatten(Color::where('tag_id', $c->id)->get()->toArray());

            array_push($colors, $color);
        }

        $categories = Tag::all()->where('tag_type', 'category');
        $brands = Tag::all()->where('tag_type', 'brand');

        return view('panel.products.edit', compact('product', 'categories', 'brands', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
