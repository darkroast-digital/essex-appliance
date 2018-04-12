<?php

namespace App\Http\Controllers\Panel;

use App\Color;
use App\Product;
use App\Variation;
use App\ProductImage;
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
        $images = explode(',', $request->_images);
        $colors = explode(',', $request->colors);

        $product = Product::create([
            'hash' => $request->_hash,
            'name' => $request->name,
            'sku' => $request->sku,
            'upc' => $request->upc,
            'description' => $request->description,
            'features' => $request->features,
            'available' => $request->available === 'on' ? 1 : 0,
            'featured' => $request->featured === 'on' ? 1 : 0,
            'price' => $request->price
        ]);

        foreach ($colors as $color) {
            $product->tag($color);
        }

        $product->tag($request->category);
        $product->tag($request->brand);

        if ($request->_images) {
            foreach ($images as $id) {
                $image = ProductImage::find($id);

                $image->imageable_id = $product->id;
                $image->imageable_type = 'App\Product';

                $image->save();
            }
        }

        $request->session()->flash('alert:sucess', 'Product was created!');

        return redirect()->route('panel.products.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Tag::all()->where('tag_type', 'category');
        $brands = Tag::all()->where('tag_type', 'brand');

        return view('panel.products.edit', compact('product', 'categories', 'brands'));
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
        $colors = explode(',', $request->colors);
        $images = explode(',', $request->_images);
        $variations = explode(',', $request->_variations);

        $product->hash = $request->_hash;
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->upc = $request->upc;
        $product->description = $request->description;
        $product->features = $request->features;
        $product->available = $request->available === 'on' ? 1 : 0;
        $product->featured = $request->featured === 'on' ? 1 : 0;
        $product->price = $request->price;

        $product->untag();

        foreach ($colors as $color) {
            $product->tag($color);
        }

        $product->tag($request->category);
        $product->tag($request->brand);

        $product->save();

        if ($request->_images) {
            foreach ($images as $id) {
                $image = ProductImage::find($id);

                $image->imageable_id = $product->id;
                $image->imageable_type = 'App\Product';

                $image->save();
            }
        }

        if ($request->_variations) {
            foreach ($variations as $id) {
                $variation = Variation::find($id);

                $variation->product_id = $product->id;

                $variation->save();
            }
        }

        $request->session()->flash('alert:sucess', 'Product was updated!');

        return redirect()->route('panel.products.index');
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
