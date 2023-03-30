<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class AdminController extends Controller
{
    public function Create()
    {
        return view('admin.admin');
        
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
 
    
          
        return view('admin.store');
    }
}
