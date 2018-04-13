<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Parttimenobody\Tags\Models\Tag;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Tag::where('tag_type', 'category')->get();
        $categories = [];

        foreach ($data as $category) {
            $category = $category->toArray()['name'];

            array_push($categories, $category);
        }

        return response()->json([
            'data' => compact('categories')
        ]);
    }
}