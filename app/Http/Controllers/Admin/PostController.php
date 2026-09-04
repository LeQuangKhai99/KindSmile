<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(15);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'summary' => 'nullable|string',
            'content' => 'nullable|string',
        ]);

        Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . time(),
            'category' => $request->category,
            'summary' => $request->summary,
            'content' => $request->content,
            'is_featured' => $request->has('is_featured'),
            'status' => $request->has('status'),
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Đã thêm bài viết mới thành công!');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'summary' => 'nullable|string',
            'content' => 'nullable|string',
        ]);

        $post->update([
            'title' => $request->title,
            'category' => $request->category,
            'summary' => $request->summary,
            'content' => $request->content,
            'is_featured' => $request->has('is_featured'),
            'status' => $request->has('status'),
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Cập nhật bài viết thành công!');
    }

    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Đã xóa bài viết!');
    }
}
