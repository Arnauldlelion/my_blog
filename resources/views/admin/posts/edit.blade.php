@extends('layouts.app')

@section('content')

<div class="controller">
    

        <h1>New Post</h1>
        <form method="POST" action="{{ route('admin.posts.update', $post->id) }}">
            @method('put')
            @csrf

              <div class="row">
                <div class="col-7">
                    <label for="title">Post Title:</label><br>
                    <input type="text" id="title" 
                        name="title" value="{{ old('title', $post->title) }}"
                        class="form-control @error('title') is-invalid @enderror">
                    @error('title')
                     <span class="invalid-feedback">{{ $message }}</span> 
                    @enderror
                
                </div>
                <div class="col-7"> 
                    <label for="category">Cover Image</label><br>
                    <input type="text" id="category" 
                        name="cover_image" value="{{ old('cover_image', $post->cover_image) }}"
                            class="form-control @error('cover_image') is-invalid @enderror">
                        @error('cover_image')
                        <span class="invalid-feedback">{{ $message }}</span> 
                        @enderror
                </div> 
                <div class="col-7"> <label for="content">Post Content:</label><br>
                    <textarea id="content" rows="5" name="content" 
                        class="form-control row-5  @error('content') is-invalid @enderror"
                        >{{ old('content') }}</textarea>
                        @error('content')
                            <span class="invalid-feedback">{{ $message }}</span> 
                        @enderror<br><br>
                </div>
              </div>
                <button type="submit" class="btn btn-primary">Create Post</button>
            </div>
        </form>
    
</div>
@endsection