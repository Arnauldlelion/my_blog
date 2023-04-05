<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);

        return view('admin.posts.index', compact('posts'));
    }

    public function create() {
        return view('admin.posts.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|max:225',
            'cover_image' => 'required|url',
            'content' => 'required',
        ]);


        $post = new Post();
        $post->title = $request->title;
        $post->cover_image = $request->cover_image;
        $post->content = $request->content;
        $post->save();

        // OR using mass assignment
        $post = Post::create([
            'title' => $request->title,
            'cover_image' => $request->cover_image,
            'content' => $request->content,
        ]);


        // Or 
        $post = Post::create($request->all());

        return redirect()->route('admin.posts.index');
    }

    public function edit($id) {
        $post = Post::findorfail($id);
      return view('admin.posts.edit',compact('post'));
    }

    public function destroy($id) {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
