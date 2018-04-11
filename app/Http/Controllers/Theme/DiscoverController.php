<?php

namespace App\Http\Controllers\Theme;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Parttimenobody\Tags\Models\Tag;

class DiscoverController extends Controller
{
    public function index(Request $request)
    {
        $tags = Tag::all()->where('tag_type', 'post');

        if ($request->query('category')) {
            $posts = Post::hasTags($request->query('category'))->orderBy('created_at', 'desc')->paginate(5);
        } else {
            $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        }

        $popular = Post::orderBy('view_count', 'desc')->paginate(4);

        return view('theme.discover', compact('tags', 'posts', 'popular'));
    }

    public function show(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)->first();
        $post->view_count++;
        $post->save();

        $tags = Tag::all()->where('tag_type', 'post');
        $popular = Post::orderBy('view_count', 'desc')->paginate(4);
        $prevPost = Post::where('id', $post->id - 1)->first();
        $nextPost = Post::where('id', $post->id + 1)->first();

        $related = Post::where('slug', '!=', $post->slug)->hasTags($post->firstTag())->orderBy(DB::raw('RAND()'))->take(3)->get();

        return view('theme.post', compact('post', 'tags', 'popular', 'prevPost', 'nextPost', 'related'));
    }
}
