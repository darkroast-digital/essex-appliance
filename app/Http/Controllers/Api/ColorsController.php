<?php

namespace App\Http\Controllers\Api;

use App\Color;
use Illuminate\Http\Request;
use Parttimenobody\Tags\Models\Tag;
use App\Http\Controllers\Controller;

class ColorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Color::with(['tag:id,name,slug'])->get();
        $colors = [];

        foreach ($data as $color) {
            $color = $color->toArray();
            unset($color['tag_id'], $color['created_at'], $color['updated_at'], $color['tag']['id']);
            $tmp = flatten($color);

            array_push($colors, $tmp);
        }

        return response()->json([
            'data' => compact('colors')
        ]);
    }
}
