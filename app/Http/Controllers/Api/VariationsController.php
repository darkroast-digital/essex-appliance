<?php

namespace App\Http\Controllers\Api;

use App\Variation;
use Spatie\Fractal\Fractal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\VariationTransformer;

class VariationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = Variation::paginate(9);
        $variations = $paginator->getCollection();

        $data = Fractal::create()
                ->collection($variations, new VariationTransformer())
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
        $variation = Variation::find($id);

        if ($variation) {
            $data = Fractal::create()
                ->item($variation, new VariationTransformer())
                ->toArray();

            return response()->json($data);
        }

        return response('Variation not found', 404);
    }
}
