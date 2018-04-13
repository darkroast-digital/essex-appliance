<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Parttimenobody\Tags\Models\Tag;
use App\Http\Controllers\Controller;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Tag::where('tag_type', 'brand')->get();
        $brands = [];

        foreach ($data as $brand) {
            $brand = $brand->toArray()['name'];

            array_push($brands, $brand);
        }

        return response()->json([
            'data' => compact('brands')
        ]);
    }
}
