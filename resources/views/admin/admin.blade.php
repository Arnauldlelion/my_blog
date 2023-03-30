@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>New Post</h1>
        <form method="POST" action="{{ route('admin.store') }}">
            @csrf

              <div class="col-7">
                <label for="title">Post Title:</label><br>
                <input type="text" id="title" name="title" class="form-control"><br><br>
              </div>
               <div class="col-7"> 
                <label for="category">Category:</label><br>
                <input type="text" id="category" name="category" class="form-control"><br><br>
               </div> 
               <div class="col-7"> <label for="content">Post Content:</label><br>
                <textarea id="content" rows="5" name="content" class="form-control row-5"></textarea><br><br>
               </div>
                <button type="submit" class="btn btn-primary">Create Post</button>
            </div>
        </form>
@endsection