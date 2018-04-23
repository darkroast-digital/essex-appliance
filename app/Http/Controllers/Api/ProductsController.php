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
    public function index(Request $request)
    {
        $pageLength = 9;
        $orderBy = 'created_at';
        $direction = 'desc';

        if ($request->query('pageLength')) {
            $pageLength = $request->query('pageLength');
        }

        if ($request->query('sortBy')) {
            $splitting = explode('-', $request->query('sortBy'));

            $orderBy = $splitting[0];
            $direction = $splitting[1];
        }

        $fullQuery = '';
        $category = '';
        $brand = '';
        $color = '';
        
        if (($request->query('category')) || ($request->query('brand')) || ($request->query('color')) || ($request->query('featured'))) {

            if ($request->query('category')) {
                $category .= $request->query('category') . ',';
            }

            if ($request->query('brand')) {
                $brand .= $request->query('brand') . ',';
            }

            if ($request->query('color')) {
                $color .= $request->query('color') . ',';
            }

            $fullQuery = $category . $brand . $color;
            $fullQuery = substr($fullQuery, 0, -1);
            $queryArray = false;

            if (strpos($fullQuery, ',') != false) {
                $fullQuery = explode(',', $fullQuery);
                $queryArray = true;
            }

            if ($request->query('featured')) {

                if ($fullQuery != '') {

                    if ($queryArray) {
                        $paginator = Product::withAllTagsArr($fullQuery)->where('featured', 1)->orderBy($orderBy, $direction)->paginate($pageLength);
                    } else {
                        $paginator = Product::hasTags($fullQuery)->where('featured', 1)->orderBy($orderBy, $direction)->paginate($pageLength);
                    }

                } else {
                    $paginator = Product::where('featured', 1)->orderBy($orderBy, $direction)->paginate($pageLength);
                }
            } else {

                if ($queryArray) {
                    $paginator = Product::withAllTagsArr($fullQuery)->orderBy($orderBy, $direction)->paginate($pageLength);
                } else {
                    $paginator = Product::hasTags($fullQuery)->orderBy($orderBy, $direction)->paginate($pageLength);
                }
                
            }
            
        } else {
            $paginator = Product::orderBy($orderBy, $direction)->paginate($pageLength);
        }
        
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
