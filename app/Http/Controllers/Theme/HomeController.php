<?php

namespace App\Http\Controllers\Theme;

use App\Http\Controllers\Controller;
use App\Post;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->limit(3)->get();
        return view('theme.home', compact('posts'));
    }
}
