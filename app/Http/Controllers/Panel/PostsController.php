<?php

namespace App\Http\Controllers\Panel;

use App\Post;
use Illuminate\Http\Request;
use Parttimenobody\Tags\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

        return view('panel.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all()->where('tag_type', 'post');

        return view('panel.posts.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::create([
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'content' => $request->content,
            'image_id' => $request->image_id,
            'user_id' => auth()->user()->id
        ]);

        $post->tag($request->tag);

        if ($request->published) {
            $post->publish();
        }

        $request->session()->flash('alert:sucess', 'Post was created!');

        return redirect()->route('panel.posts.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all()->where('tag_type', 'post');

        return view('panel.posts.edit', compact('post', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->title = $request->title;
        $post->content = $request->content;

        $post->retag($request->tag);

        if (request('image_id') !== null) {
            $post->image_id = request('image_id');
        }

        if ($request->published) {
            $post->publish();
        } else {
            $post->unpublish();
        }

        $post->save();

        $request->session()->flash('alert:sucess', 'Post was updated!');

        return redirect()->route('panel.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
