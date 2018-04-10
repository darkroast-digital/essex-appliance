<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use Parttimenobody\Tags\Models\Tag;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index(Request $request, $type)
    {
        $tags = Tag::all()->where('tag_type', str_singular($type));

        return view('panel.categories.index', compact('tags', 'type'));
    }

    public function store(Request $request, $type)
    {
        $tag = Tag::forceCreate([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'tag_type' => str_singular($type)
        ]);

        $request->session()->flash('alert:success', 'Category Was Added!');

        return redirect()->route('panel.categories', $type);
    }

    public function delete(Request $request, $type, $id)
    {
        $tag = Tag::find($id);

        $tag->delete();

        $request->session()->flash('alert:error', 'Category Was Deleted!');

        return redirect()->route('admin.categories.index');
    }
}
