<?php

namespace App\Http\Controllers\Api;

use App\Product;
use Spatie\Fractal\Fractal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\ProductTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = Product::paginate(10);
        $products = $paginator->getCollection();

        $data = Fractal::create()
                ->collection($products, new ProductTransformer())
                ->paginateWith(new IlluminatePaginatorAdapter($paginator))
                ->toArray();

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        if ($product) {
            $data = Fractal::create()
                ->item($product, new ProductTransformer())
                ->toArray();

            return response()->json($data);
        }

        return response('Product not found', 404);
    }
}
