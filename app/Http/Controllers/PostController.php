<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::where('status', true);

        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        $posts = $query->latest()->paginate(9);
        $featuredPosts = Post::where('is_featured', true)->where('status', true)->take(4)->get();
        $categories = Post::distinct()->pluck('category');

        return view('client.posts.index', compact('posts', 'featuredPosts', 'categories'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->where('status', true)->firstOrFail();
        $post->increment('views');

        $relatedPosts = Post::where('id', '!=', $post->id)->where('status', true)->latest()->take(3)->get();

        return view('client.posts.show', compact('post', 'relatedPosts'));
    }
}
