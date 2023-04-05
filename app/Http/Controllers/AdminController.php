<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class AdminController extends Controller
{
    public function Create()
    {
        $posts = Post::orderBy('create_at', 'desc')->paginate(5);
        
        return view('admin.admin', compact('posts'));
        
    }
   
 public function Store(Request $request){
    $validatedData = $request->validate([
        'Post Title' => 'required|max:255',
        'Category' => 'required',
        'Post Content' => 'required|max:255',
    ]);
    
     // Create a new post with the validated data
     $post = new Post;
     $post->title = $validatedData['Post Title'];
     $post->cover_image = $validatedData['Category'];
     $post->description = $validatedData['Post Content'];
     $post->save();

        return redirect()->back()->with('success', 'Post created successfully!');
    }
}
